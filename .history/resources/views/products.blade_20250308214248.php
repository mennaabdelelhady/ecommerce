@extends('layouts.default')
@section('title', 'Ecom- Home')
@section('content')
    <main class ="container">
        <section>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col">
                        <p>{{ $product->title }}</p>
                    </div>
                @endforeach

            </div>
        </section>
    </main>
@endsection
