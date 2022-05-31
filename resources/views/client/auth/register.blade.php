@php
    /** @var $countries \App\Models\Country[] */
@endphp
@extends('layouts.noauth-template')
@section('title')
    Register
@endsection
@section('content')
    <div id="register-page">
        <nav id="nav" class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="/">{{ env('APP_NAME', 'Fraud Training') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register-page') }}">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <section id="register-section">
            @if (session('error'))
                <div class="container">
                    <div class="alert alert-danger mb-5 w-50 mx-auto" role="alert">
                        {{ session('error') }}
                    </div>
                </div>
            @endif
            <h1 class="section-title">Please Register</h1>
            <form action="#" method="POST">
                @csrf
                <div class="input-group mb-2">
                    <input type="text" placeholder="Full Name" class="form-control @error('name') is-invalid @enderror" name="name" required>
                    <div class="invalid-feedback">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="input-group mb-2">
                    <input type="email" placeholder="Email Address" class="form-control @error('error') is-invalid @enderror" name="email" required>
                    <div class="invalid-feedback">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="input-group mb-2">
                    <input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                    <div class="invalid-feedback">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="input-group mb-2">
                    <input type="password" placeholder="Password Confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required>
                    <div class="invalid-feedback">
                        @error('password_confirmation')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="input-group mb-3">
                    <select name="country" class="form-control @error('country') is-invalid @enderror" required>
                        <option>Select Your Country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->getId() }}">{{ $country->getNiceName() }}</option>
                        @endforeach
                    </select>

                    <div class="invalid-feedback">
                        @error('country')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="input-group">
                    <button class="btn btn-primary">Register</button>
                </div>
            </form>
        </section>
    </div>
@endsection