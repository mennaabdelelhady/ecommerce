@extends('layouts.default')
@section('title', 'Ecom- Home')
@section('content')
    <main class ="container" style="max-width: 900px">
        <section>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-12 col-md-6 col-lg-3">
                        <img src="{{$product->image}}" width="100%">
                        <p>{{ $product->title }}</p>

                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection
