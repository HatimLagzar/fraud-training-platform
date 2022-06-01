@extends('layouts.auth-template')
@section('title')
  Dashboard
@endsection
@section('content')
  <div class="container mt-5">
    <section>
      <h1 class="section-title">You're connected as {{ auth()->user()->getName() }}</h1>
      <p>Welcome to your dashboard</p>
    </section>
  </div>
@endsection