@php
    /** @var $questions \Illuminate\Database\Eloquent\Collection|\App\Models\Question[] */
@endphp

@extends('admin.layouts.auth-template')
@section('title')
    Questions
@endsection
@section('content')
    <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>Content</th>
            <th>Replies</th>
            <th>Actions</th>
        </tr>
        @foreach($questions as $question)
            <tr>
                <td>{{ $question->getId() }}</td>
                <td>{{ $question->getContent() }}</td>
                <td>
                    <ul>
                        @foreach($question->getReplies() as $reply)
                            <li {{ $reply->isCorrect() ? 'class=fw-bold' : '' }}>{{ $reply->getContent() }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>

                </td>
            </tr>
        @endforeach
    </table>
@endsection