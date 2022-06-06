@extends('layouts.auth-template')
@section('title')
  {{__('Subscription')}}
@endsection
@section('content')
  <div id="subscribe-success-page">
    <div class="container mt-5">
      <i class="fa fa-circle-check text-center d-block mb-3" style="font-size: 150px"></i>
      <h1 class="mb-4 w-75 text-center mx-auto">{{__('You did subscribe successfully, please verify your email address by clicking the link we sent you in your email address!')}}</h1>
    </div>
  </div>
@endsection