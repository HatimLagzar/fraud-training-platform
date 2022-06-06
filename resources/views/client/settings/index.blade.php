@php
  /** @var $user \App\Models\User */
@endphp
@extends('layouts.auth-template')
@section('title')
  {{ __('Settings') }}
@endsection
@section('content')
  <div id="settings-page">
    <div class="container mt-5">
      <h1>{{ __('Settings') }}</h1>

      <h2>{{ __('Subscription') }}</h2>
      @if($user->subscribed() && $user->subscription()->onGracePeriod() === false)
        <form action="{{ route('dashboard.cancel-subscription') }}" method="POST">
          @csrf
          <button class="btn btn-sm btn-primary">{{ __('Stop My Subscription') }}</button>
        </form>
      @elseif($user->subscription()->onGracePeriod())
        <p>{{ __('Your subscription has been cancelled successfully, you won\'t be charged next months.') }}</p>
      @else
        <p>{{ __("You're not yet subscribed.") }}</p>
      @endif
    </div>
  </div>
@endsection