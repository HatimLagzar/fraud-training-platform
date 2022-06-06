@extends('layouts.noauth-template')
@section('title')
  {{__('Home')}}
@endsection
@section('content')
  @if (session('success'))
    <div class="alert alert-success m-0 w-100" role="alert">
      {{ session('success') }}
    </div>
  @endif
  @if (session('error'))
    <div class="alert alert-danger m-0 w-100" role="alert">
      {{ session('error') }}
    </div>
  @endif
  <div id="home-page">
    <header id="header">
      @if (auth()->guard('web')->user() instanceof \App\Models\User)
        <nav id="nav" class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container">
            <a class="navbar-brand" href="/">{{ env('APP_NAME', 'Fraud Training') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('dashboard.quiz.ask') }}">{{ __('Training') }}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('dashboard.home') }}">{{ __('Posts') }}</a>
                </li>
                <li class="nav-item">
                  <form action="{{ route('logout') }}" class="d-inline-block" method="POST">
                    @csrf
                    <button class="btn btn-transparent nav-link text-white" type="submit">{{ __('Logout') }}</button>
                  </form>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/#contact">{{ __('Contact') }}</a>
                </li>
                <x-flags-menu></x-flags-menu>
              </ul>
            </div>
          </div>
        </nav>
      @else
        <nav id="nav" class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container">
            <a class="navbar-brand" href="/">{{ env('APP_NAME', 'Fraud Training') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login-page') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register-page') }}">{{ __('Register') }}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#contact">{{ __('Contact') }}</a>
                </li>
                <x-flags-menu></x-flags-menu>
              </ul>
            </div>
          </div>
        </nav>
      @endif

      <div id="hero">
        <h1>{!! __('Protect the money on<br>your credit card FROM FRAUD NOW') !!}</h1>

        <p>{{ __('Protect yourself and your money from scammers on the internet by using our training to level up your knowledge of internet security and get our daily notifications about trending scams types and ways to protect against them.') }}</p>

        <a href="{{ route('register-page') }}" class="btn btn-primary">{{ __('Train Now') }}</a>
      </div>
    </header>

    <section id="you-are-next">
      <h2 class="section-title">{{ __('You’re Next In The List') }}</h2>
      <div class="container">
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col">
            <img src="{{ asset('images/target.png') }}" alt="" width="256" height="256">
          </div>
          <div class="col-lg-7 col-12 section-content">
            <p>{{ __('Internet scams that target victims through online services account for millions of dollars worth of fraudulent activity every year. And the figures continue to increase as internet usage expands and cyber-criminal techniques become more sophisticated. Here are some facts:') }}</p>
            <ul>
              <li>{{ __('According to the Aite-Novarica Group, 47 percent of Americans experienced financial identity theft in 2020.') }}</li>
              <li>{{ __('Credit card fraud is among the top 5 types of identity theft in 2021.') }}</li>
              <li>{{ __('California counts as the number 1 with more than $1,228 Million losses.') }}</li>
              <li>{{__('In 2021, $323 million was reported lost in scams.')}}</li>
            </ul>
          </div>
          <div class="col-lg-1"></div>
        </div>
      </div>
    </section>

    <section id="knowledge-first">
      <h2 class="section-title">{{__('Knowledge Before Anything')}}</h2>
      <div class="container">
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col">
            <img src="{{ asset('images/shield.png') }}" alt="" width="256" height="256">
          </div>
          <div class="col-lg-7 col-12 section-content">
            <p>{{ __('Protect yourself and your money from scammers on the internet by using our training to improve your knowledge of internet security and get our daily notifications about trending scams types and ways to protect against them.') }}</p>

            <p class="mb-0">{{__('Our training includes the following:')}}</p>
            <ul>
              <li>{{__('Quick training compress to take you less than 5 minutes.')}}</li>
              <li>{{__('Daily notifications about trending scams and types of frauds.')}}</li>
              <li>{{__('Get certified by our company.')}}</li>
            </ul>
          </div>
          <div class="col-1"></div>
        </div>
      </div>
    </section>

    <section id="contact">
      <h2 class="section-title">{{__('Get In Touch')}}</h2>
      <div class="container">
        <form action="{{ route('contact') }}" method="POST">
          @csrf

          <div class="input-group mb-2">
            <input type="text" placeholder="{{__('Name')}}" class="form-control" name="name">
          </div>

          <div class="input-group mb-2">
            <input type="text" placeholder="{{__('Subject')}}" class="form-control" name="subject">
          </div>

          <div class="input-group mb-2">
            <input type="email" placeholder="{{__('Email Address')}}" class="form-control" name="email">
          </div>

          <div class="input-group mb-2">
            <textarea placeholder="{{__('Message')}}" class="form-control" name="message"></textarea>
          </div>

          <div class="input-group">
            <button type="submit" class="btn btn-primary">{{__('Send')}}</button>
          </div>
        </form>
      </div>
    </section>

    <footer>
      <div class="container">
        <p>{{__('All rights reserved')}} &copy; {{ date('Y') }}</p>
      </div>
    </footer>
  </div>
@endsection