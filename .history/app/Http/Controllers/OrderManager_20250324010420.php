<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Stripe\StripeClient;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;
use Stripe\Exception\ApiErrorException;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Validator;
use Stripe\Stripe;



class OrderManager extends Controller
{
    function showCheckout()
    {
        return view('checkout');
    }

    function checkoutPost(Request $request)
    {

        $request->validate([
            'address' => 'required|string|max:255',
            'pincode' => 'required|numeric',
            'phone' => 'required|string|max:15',
        ]);
        
        
        $cartItems = DB::table("cart")
        ->join('products','cart.product_id','=','products.id')
        ->select(
            "cart.product_id",
            "cart.quantity", // Use the actual quantity from the cart table
            'products.price',
            'products.title'
        )
        ->where("cart.user_id",auth()->user()->id)
        ->groupBy(
            "cart.product_id",
            "cart.quantity",
            'products.price',
            'products.title'
        )
        ->get();

        if($cartItems->isEmpty()){
            return redirect(route('cart.show'))->with('error','No items in cart');
        }


        $productIds = [];
        $quantities = [];
        $totalPrice = 0;
        $lineItems = [];

        foreach($cartItems as $cartItem){
            $productIds[] = $cartItem->product_id;
            $quantities[] = $cartItem->quantity;
            $totalPrice += $cartItem->price * $cartItem->quantity;
            $linePrice = $cartItem->price * $cartItem->quantity;
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'USD',
                    'product_data' => [
                        'name' => $cartItem->title,
                    ],
                    'unit_amount' => $cartItem->price * 100,
                ],
                'quantity' => $cartItem->quantity,
            ];
        }

        $order = new Orders();
        $order->user_id = auth()->user()->id;
        $order->address = $request->address;
        $order->pincode = $request->pincode;
        $order->phone = $request->phone;
        $order->product_id = json_encode($productIds);
        $order->total_price = $totalPrice;
        $order->quantity = json_encode($quantities);
        if($order->save()){
            DB::table("cart")->where("user_id",auth()->user()->id)->delete();
            $stripe =new StripeClient(config("app.STRIPE_KEY"));

            $checkoutSession = $stripe->checkout->sessions->create([
                'success_url' => route('payment.success',
                ['order_id' => $order->id]),
                'cancel_url' => route('payment.error'),
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'customer_email' => auth()->user()->email,
                'metadata' => [
                    'order_id' => $order->id
                ]
            ]);
            return redirect($checkoutSession->url);
        }

        return redirect(route('cart.show'))->with('error','Failed to place order');
    }
    function paymentError()
    {
        return "error";
    }
    function paymentSuccess($order_id)
    {
        return "success" . $order_id;
    }

    function webhookStripe(Request $request)
    {
        $endpointSecret = config('app.STRIPE_WEBHOOK_SECRET'); 
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        
        try{
            $event = Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );

        } catch (UnexpectedValueException $e) {
            return response()->json(['error'=>'invalid payload'],400);
            exit();
        } catch (SignatureVerificationException $e) {
            return response()->json(['error'=>'invalid payload'],400);
            exit();
        }
        if ($event->type == 'checkout.session.completed') {
            $session = $event->data->object;
            $orderId = $session->metadata->order_id;
            $paymentId = $session->payment_intent;
            $order = Orders::find($orderId);
            if ($order){
                $order->payment_id = $paymentId;
                $order->status = 'payment_completed';
                $order->save();
            }
        }
        return response()->json(['status'=>'success'],200);

    }
}
