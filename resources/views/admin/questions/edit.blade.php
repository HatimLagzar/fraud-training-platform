@php
    /** @var $question \App\Models\Question */
    /** @var $replies \App\Models\Reply[] */
@endphp

@extends('admin.layouts.auth-template')
@section('title')
    Edit Question
@endsection

@section('content')
    <section class="mt-3">
        <h2>Edit Question</h2>
        <form action="{{ route('admin.questions.update', ['question' => $question]) }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="contentInput" class="form-label">Question</label>
                <textarea id="contentInput"
                          name="content"
                          class="form-control"
                          placeholder="Place your question here"
                          required>{{ $question->getContent() }}</textarea>
            </div>

            <div id="replies" class="px-4">
                <h4>Replies List</h4>

                @foreach($replies as $key => $reply)
                    <div class="mb-3 reply-item">
                        <div class="form-group mb-3">
                            <label for="replies_{{ $key }}">Reply</label>
                            <textarea id="replies_{{ $key }}" name="replies[{{ $key }}]" class="form-control">{{ $reply->getContent() }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="replies_{{ $key }}_CORRECT">Is Correct ?</label>
                            <input value="{{ $key }}" id="replies_{{ $key }}_CORRECT" name="correct_reply_index" type="radio" class="form-check-input" {{ $reply->isCorrect() ? 'checked' : '' }}>
                        </div>

                        <button type="button" role="button" class="btn btn-sm btn-danger delete-reply"><i class="fa fa-trash"></i> Remove</button>
                    </div>
                @endforeach

                <button type="button" role="button" id="add-new-reply" class="btn w-100 btn-primary btn-sm mb-2">
                    <i class="fa fa-plus"></i>
                </button>
            </div>

            <button class="btn btn-primary"><i class="fa fa-paper-plane"></i> Update</button>
            <button class="btn btn-secondary"><i class="fa fa-eraser"></i> Clear</button>
        </form>
    </section>
@endsection