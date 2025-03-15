@extends('layouts.default')
@section('title', 'Ecom- Home')
@section('content')
    <main class ="container" style="max-width: 900px">
        <section>
            <div class="row">
                @foreach ($cartItems as $cart)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card p-2 shadow-sm">
                        <img src="{{$cart->image}}" width="100%">
                        <div>
                            <a href="{{route("products.details",$cart->slug)}}">{{ $cart->title }}</a> |
                            <span>${{$cart->price}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div>
                {{$products->links()}}
            </div>
        </section>
    </main>
@endsection