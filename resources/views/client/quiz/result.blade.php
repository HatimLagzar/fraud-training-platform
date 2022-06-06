@php
  /** @var $question \App\Models\Question */
@endphp

@extends('layouts.auth-template')
@section('title')
  {{__('Quiz')}}
@endsection
@section('content')
  <div class="container mt-5">
    <section>
      <h1>{{__('Please answer the following question')}}</h1>
      <h3>{{__(Question)}}</h3>
      <p>{{ $question->getContentByLocale() }}</p>

      <h3>{{__('Replies')}}</h3>
      <form action="{{ route('dashboard.quiz.reply', ['question' => $question]) }}" method="POST">
        @csrf

        @foreach($question->getReplies() as $reply)
          <div class="form-check">
            <input class="form-check-input {{ $reply->isCorrect() ? 'is-valid' : 'is-invalid' }}"
                   type="radio"
                   name="reply_id"
                   value="{{ $reply->getId() }}"
                   id="reply_{{$reply->getId()}}"
                   {{ $userResponse->getReplyId() === $reply->getId() ? 'checked' : '' }}
                   disabled
                   required>

            <label class="form-check-label" for="reply_{{$reply->getId()}}">
              {{ $reply->getContentByLocale() }}
            </label>
          </div>
        @endforeach

        <div class="input-group mt-3">
          <a class="btn btn-primary m-0 fs-6 px-4" href="{{ route('dashboard.quiz.ask') }}">
            {{__('Next Question')}}<i class="fa fa-arrow-right ms-2"></i>
          </a>
        </div>
      </form>
    </section>
  </div>
@endsection