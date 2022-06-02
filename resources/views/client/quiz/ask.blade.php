@php
  /** @var $question \App\Models\Question */
@endphp

@extends('layouts.auth-template')
@section('title')
  Quiz
@endsection
@section('content')
  <div class="container mt-5">
    <section>
      <h1>Please answer the following question</h1>
      <h3>Question</h3>
      <p>{{ $question->getContentByLocale() }}</p>

      <h3>Replies</h3>
      <form action="{{ route('dashboard.quiz.reply', ['question' => $question]) }}" method="POST">
        @csrf

        @foreach($question->getReplies() as $reply)
          <div class="form-check">
            <input class="form-check-input"
                   type="radio"
                   name="reply_id"
                   value="{{ $reply->getId() }}"
                   id="reply_{{$reply->getId()}}"
                   required>

            <label class="form-check-label" for="reply_{{$reply->getId()}}">
              {{ $reply->getContentByLocale() }}
            </label>
          </div>
        @endforeach

        <div class="input-group mt-3">
          <button class="btn btn-primary m-0 fs-6 px-4"><i class="fa fa-paper-plane me-2"></i>Submit My Answer</button>
        </div>
      </form>
    </section>
  </div>
@endsection