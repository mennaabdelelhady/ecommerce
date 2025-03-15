@extends('layouts.default')
@section('title', 'Ecom- Home')
@section('content')
    <main class ="container">
        <section>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-12 col-md-6 col-lg-4">
                        <p>{{ $product->title }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection
