@extends('layouts.default')
@section('title', 'Ecom- Home')
@section('content')
    <main class ="container">
        <section>
            <div class="row">
                @foreach ($products as $product)
                    <p>{{ $product->title }}</p>
                    <div class="col"></div>
                @endforeach

            </div>
        </section>
    </main>
@endsection
