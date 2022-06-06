@extends('layouts.auth-template')
@section('title')
  {{ __('Settings') }}
@endsection
@section('content')
  <div id="settings-page">
    <div class="container mt-5">
      <h1>{{ __('Settings') }}</h1>

      <h2>{{ __('Subscription') }}</h2>
      @if($user->subscribed())
        <form action="{{ route('dashboard.cancel-subscription') }}" method="POST">
          @csrf
          <button class="btn btn-sm btn-primary">{{ __('Stop My Subscription') }}</button>
        </form>
      @else
        <p>{{ __("You're not yet subscribed.") }}</p>
      @endif
    </div>
  </div>
@endsection