@php
  /** @var $questions \App\Models\Question[]|\Illuminate\Database\Eloquent\Collection */
@endphp

@extends('layouts.auth-template')
@section('title')
  Dashboard
@endsection
@section('content')
  <div class="container mt-5">
    <section>
      <h1 class="section-title">You're connected as {{ auth()->guard('web')->user()->getName() }}</h1>
      <p>Welcome to your dashboard</p>

      @if($questions->count() > 0)
        <p class="text-danger">You are missing some important information, please take the quick training by clicking the button below:</p>
        <a class="btn btn-primary" href="{{ route('dashboard.quiz.ask') }}">Train Now</a>
      @else
        <p class="text-success">Congrats! You took all the quick trainings.</p>
      @endif
    </section>
  </div>
@endsection