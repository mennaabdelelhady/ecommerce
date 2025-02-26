@extends('layouts.auth')
@section('style')
    <style>
        html,
        body {
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
@section('content')
    <main class="form-signin w-100 m-auto">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <img class="mb-4" src="{{ asset('assets/img/ecommerce_logo.webp') }}" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please signup</h1>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="name" placeholder="Enter your name">
                <label for="floatingInput">Enter name</label>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="Enter your email">
                <label for="floatingInput">Enter email</label>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    
            @if(session()->has("success"))
                <div class="alert alert-success">{{ session()->get("success") }}</div>
            @endif
            @if(session()->has("error"))
                <div class="alert alert-danger">{{ session("error") }}</div>
            @endif
            <button class="w-100 btn btn-primary w-100 py-2" type="submit">Sign Up</button>
            <a href="{{ route('login') }}" class="btn btn-link w-100">Already have an account? Login</a>
            <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2021</p>
        </form>
    </main>
@endsection
