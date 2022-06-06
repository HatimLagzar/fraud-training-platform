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

      <h2>{{ __('Update Password') }}</h2>

      <form action="{{ route('dashboard.password.update') }}" method="POST" class="mt-3 mb-5">
        @csrf
        <div class="input-group mb-2">
          <input type="password" class="form-control mx-0 @error('current_password') is-invalid @enderror" placeholder="{{ __('Current Password') }}" name="current_password">
          @error('current_password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="input-group mb-2">
          <input type="password" class="form-control mx-0 @error('new_password') is-invalid @enderror" placeholder="{{ __('New Password') }}" name="new_password">
          @error('new_password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control mx-0 @error('new_password_confirmation') is-invalid @enderror" placeholder="{{ __('Password Confirmation') }}" name="new_password_confirmation">
          @error('new_password_confirmation')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="input-group">
          <button class="btn btn-sm btn-primary mx-0">{{ __('Update My Password') }}</button>
        </div>
      </form>

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