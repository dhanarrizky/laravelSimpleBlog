@extends('layouts.app')

@section('content')
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.84.0">
        <title>Signin Template · Bootstrap v5.0</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



        <!-- Bootstrap core CSS -->
        <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }

            main {
                /* display: block; */
                margin-left: auto;
                margin-right: auto;
                width: 500px;
            }
        </style>
    </head>

    <body class="text-center">
        <main class="form-signin">
            <img class="mb-4" src="{{ asset('assets/brand/bootstrap-logo.svg') }}" alt="" width="72"
                height="57">
            <h1 class="h3 mb-3 fw-normal">Please Register First</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-floating">
                    <input type="name" class="form-control mt-3 @error('name') is-invalid @enderror" id="floatingInput"
                        value="{{ old('name') }}" name="name" placeholder="name@example.com">
                    <label for="floatingInput">Name</label>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control mt-3 @error('email') is-invalid @enderror" id="floatingInput"
                        value="{{ old('email') }}" name="email" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control mt-3 @error('password') is-invalid @enderror"
                        id="floatingPassword" value="{{ old('password') }}" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control mt-3 @error('password-confirm') is-invalid @enderror"
                        id="floatingpassword-confirm" value="{{ old('password-confirm') }}" name="password_confirmation"
                        placeholder="password confirm">
                    <label for="floatingpassword-confirm">password confirm</label>
                    @error('password-confirm')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Register</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
            </form>
        </main>
    </body>

    </html>
@endsection
