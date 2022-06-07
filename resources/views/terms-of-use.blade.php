@extends('layouts.noauth-template')
@section('title')
  {{ __('Terms of use and conditions') }}
@endsection
@section('content')
  @if(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName() !== 'home')
    <nav id="nav" class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">{{ env('APP_NAME', 'Fraud Training') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('dashboard.home') }}">{{__('Posts')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('dashboard.settings.index') }}">{{ __('Settings') }}</a>
            </li>
            <li class="nav-item">
              <form action="{{ route('logout') }}" class="d-inline-block" method="POST">
                @csrf
                <button class="btn btn-transparent nav-link text-white" type="submit">{{__('Logout')}}</button>
              </form>
            </li>
            <x-flags-menu></x-flags-menu>
          </ul>
        </div>
      </div>
    </nav>
  @endif

  <div class="container mt-5">
    <section>
      <h1 class="section-title">{{ __('Terms of use and conditions') }}</h1>
      <p>{!! __('terms-and-conditions-text') !!}</p>
    </section>
  </div>
@endsection