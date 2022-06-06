@php
  /** @var $countries \App\Models\Country[] */
@endphp
@extends('layouts.noauth-template')
@section('title')
  {{ __("Reset Password") }}
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
              <a class="nav-link" href="{{ route('login-page') }}">{{__('Login')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register-page') }}">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <x-flags-menu></x-flags-menu>
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
      @if (session('success'))
        <div class="container">
          <div class="alert alert-success mb-5 w-50 mx-auto" role="alert">
            {{ session('success') }}
          </div>
        </div>
      @endif
      <h1 class="section-title">{{__('Reset your password')}}</h1>
      <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="input-group mb-2">
          <input type="email" placeholder="{{__('Email Address')}}" class="form-control @error('email') is-invalid @enderror" name="email" required>
          <div class="invalid-feedback">
            @error('email')
            {{ $message }}
            @enderror
          </div>
        </div>
        <div class="input-group">
          <button class="btn btn-primary">{{__('Send me the link')}}</button>
        </div>
      </form>
    </section>
  </div>
@endsection