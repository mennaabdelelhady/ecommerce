@extends('layouts.default')
@section('title', 'Ecom- Home')
@section('content')
    <main class ="container">
        <section>
            @foreach ($products as $product)
                
            @endforeach
        </section>
    </main>
@endsection
