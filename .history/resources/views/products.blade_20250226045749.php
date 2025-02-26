@extends('layouts.default')
@section('title', 'Ecom- Home')
@section('content')
    <main class ="container">
        <section>
            @foreach ($products as $product)
            <p>{{$product->title}}</p>
                
            @endforeach
        </section>
    </main>
@endsection
