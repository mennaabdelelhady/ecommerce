@extends('layouts.default')
@section('title', 'Ecom- Home')
@section('content')
    <main class ="container" style="max-width: 900px">
        <section>
           <img src="{{$product->image}}" width="100%">
           <h1>{{$product->title}}</h1>
           <p>{{$product->price}}</p>
           <p>{{$product->description}}</p>
           <a href ="{{route("cart.add")}}" class="btn btn-success">Add to Cart</a>
        </section>
    </main>
@endsection
