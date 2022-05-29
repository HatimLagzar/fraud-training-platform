@php
    /** @var $questions \Illuminate\Database\Eloquent\Collection|\App\Models\Question[] */
@endphp

@extends('admin.layouts.auth-template')
@section('title')
    Questions
@endsection
@section('content')
    <div class="row mt-5 mb-3">
        <div class="col">
            <h2>Questions List</h2>
        </div>
        <div class="col">
            <a href="{{ route('admin.questions.create') }}" class="btn btn-primary float-end"><i class="fa fa-plus"></i> Add Question</a>
        </div>
    </div>
    <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>Content</th>
            <th>Replies</th>
            <th>Actions</th>
        </tr>
        @foreach($questions as $key => $question)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $question->getContent() }}</td>
                <td>
                    <ul>
                        @foreach($question->getReplies() as $reply)
                            <li {{ $reply->isCorrect() ? 'class=fw-bold' : '' }}>{{ $reply->getContent() }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <a class="btn btn-sm btn-secondary border-0 "><i class="fa fa-pencil"></i> Edit</a>
                    <form action="{{ route('admin.questions.delete', ['question' => $question]) }}" method="POST"
                          class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger border-0"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection