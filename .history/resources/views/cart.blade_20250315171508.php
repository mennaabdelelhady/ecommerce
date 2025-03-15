@extends('layouts.default')
@section('title', 'Ecom- Home')
@section('content')
    <main class ="container" style="max-width: 900px">
        <section>
            <div class="row">
                @foreach ($cartItems as $cart)
                <div class="col-12">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                          <div class="col-md-4">
                            <img src="{{$cart->image}}" class="img-fluid rounded-start" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title"><a href="{{route("products.details",$cart->slug)}}">{{ $cart->title }}</a> Card title</h5>
                              <p class="card-text">${{$cart->price}}</p>
                              <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="card p-2 shadow-sm">
                        <img src="{{$cart->image}}" width="200%">
                        <div>
                            |
                            <span></span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection