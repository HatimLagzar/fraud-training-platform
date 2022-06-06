@extends('layouts.auth-template')
@section('title')
  {{__('Subscription')}}
@endsection
@section('content')
  <div id="subscribe-page">
    <div class="container mt-5">
      <h1 class="mb-4 text-center">{{__('To continue your training, please fill out the form below')}}</h1>

      <form action="{{ route('dashboard.subscribe.pay') }}"
            method="POST"
            id="payment-form"
            class="w-50 mx-auto"
            data-secret="{{ $intent->client_secret }}">
        @csrf

        <div class="input-group mb-2">
          <input class="form-control w-100" type="text" name="card-holder-name" id="card-holder-name" placeholder="{{__('Card Holder Name')}}">
        </div>

        <div id="card-element"></div>
        <div id="card-errors"></div>

        <button id="card-button"
                class="btn btn-primary mt-3 d-block">
          {{__('Subscribe Now with only USD $1')}}
        </button>
      </form>
    </div>
  </div>

  <style>
      #subscribe-page form input {
          border: 2px solid #000 !important;
          font-weight: 400;
          min-width: auto;
          max-width: none;
          text-align: left !important;
      }

      /*#subscribe-page ::placeholder {*/
      /*    color: #aab7c4 !important;*/
      /*}*/

      #card-element {
          padding: .5rem .75rem;
          border: 2px solid #000 !important;
      }
  </style>

  <script src="https://js.stripe.com/v3"></script>
  <script>
      const stripe = Stripe('{{ env('STRIPE_KEY') }}');
      const elements = stripe.elements();
      const style = {
          base: {
              color: '#000',
              border: '2px solid #000',
              fontFamily: 'Roboto, sans-serif',
              fontSmoothing: 'antialiased',
              fontSize: '18px',
              '::placeholder': {
                  color: '#000'
              }
          },
          invalid: {
              color: '#fa755a',
              iconColor: '#fa755a',
          }
      }

      const card = elements.create('card', {
          style
      })

      card.mount('#card-element')

      card.on('change', function (e) {
          const displayError = document.getElementById('card-errors');
          if (e.error) {
              displayError.textContent = e.error.message
          } else {
              displayError.textContent = ''
          }
      })

      const form = document.getElementById('payment-form');
      const clientSecret = form.dataset.secret

      const cardHolderName = document.getElementById('card-holder-name');

      form.addEventListener('submit', async function (e) {
          e.preventDefault();
          const {setupIntent, error} = await stripe.confirmCardSetup(
              clientSecret, {
                  payment_method: {
                      card: card,
                      billing_details: {name: cardHolderName.value}
                  }
              }
          );

          if (error) {
              const errorElement = document.getElementById('card-errors')
              errorElement.textContent = error.message
          } else {
              stripeTokenHandler(setupIntent.payment_method)
          }
      })

      function stripeTokenHandler(token) {
          const form = document.getElementById('payment-form')
          const hiddenInput = document.createElement('input')
          hiddenInput.setAttribute('type', 'hidden')
          hiddenInput.setAttribute('name', 'paymentMethodId')
          hiddenInput.setAttribute('value', token)
          form.appendChild(hiddenInput)

          form.submit();
      }

  </script>
@endsection