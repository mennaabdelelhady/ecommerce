@extends('layouts.default')
@section('title', 'Ecom- Home')
@section('content')
    <main class ="container" style="max-width: 900px">
        <section>
            <div class="row">
                @foreach ($products as $product)
                    <div class="card col-12 col-md-6 col-lg-3 p-2 shadow-sm">
                        <img src="{{$product->image}}" width="100%">
                        <div>
                            <a href="">{{ $product->title }}</a>
                            <span>{{$product->price}}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection
