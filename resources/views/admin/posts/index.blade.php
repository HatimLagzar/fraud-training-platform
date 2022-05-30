@php
    /** @var $posts \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] */
@endphp

@extends('admin.layouts.auth-template')
@section('title')
    Posts
@endsection
@section('content')
    <div class="row mt-5 mb-3">
        <div class="col">
            <h2>Posts List</h2>
        </div>
        <div class="col">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary float-end"><i class="fa fa-plus"></i> Add Post</a>
        </div>
    </div>
    <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>Title EN</th>
            <th>Title FR</th>
            <th>Title ES</th>
            <th>Title DE</th>
            <th>Title IT</th>
            <th>Actions</th>
        </tr>
        @foreach($posts as $key => $post)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ \Illuminate\Support\Str::limit($post->getTitleEN(), 40) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($post->getTitleFR(), 40) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($post->getTitleES(), 40) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($post->getTitleDE(), 40) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($post->getTitleIT(), 40) }}</td>
                <td>
                    <a class="btn btn-sm btn-secondary border-0" href="{{ route('admin.posts.edit', ['post' => $post]) }}"><i class="fa fa-pencil"></i> Edit</a>
                    <form action="{{ route('admin.posts.delete', ['post' => $post]) }}" method="POST"
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