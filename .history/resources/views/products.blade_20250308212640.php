@extends('layouts.default')
@section('title', 'Ecom- Home')
@section('content')
    <main class ="container">
        <section>
            <div class="row">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>

            </div>
            @foreach ($products as $product)
            <p>{{$product->title}}</p>
                
            @endforeach
        </section>
    </main>
@endsection
