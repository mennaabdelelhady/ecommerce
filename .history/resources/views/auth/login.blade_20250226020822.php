@extends("layouts.auth")
@section("style")
    <style>
        html, body {
            height: 100%; 
        }
        .form-signin {
            max-width: 330px;
            padding: 15px;
        }
        .form-signin .form-floating:focus-within {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
@endsection
@section("content")
    <main class="form-signin w-100 m-auto">
        <form action="{{ route("login post") }}" method="post">
            @csrf
            <img class="mb-4" src="{{ asset("assets/img/bootstrap-logo.svg") }}" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="