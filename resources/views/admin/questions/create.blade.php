@extends('admin.layouts.auth-template')
@section('title')
    Create question
@endsection
@section('content')
    <section class="mt-3">
        <h2>Create Question</h2>
        <form action="{{ route('admin.questions.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="contentInput" class="form-label">Question</label>
                <textarea id="contentInput" name="content" class="form-control" placeholder="Place your question here"
                          required></textarea>
            </div>

            <div id="replies" class="px-4">
                <h4>Replies List</h4>
                <button type="button" role="button" id="add-new-reply" class="btn w-100 btn-primary btn-sm mb-2">
                    <i class="fa fa-plus"></i>
                </button>
            </div>

            <button class="btn btn-primary"><i class="fa fa-plus"></i> Create</button>
            <button class="btn btn-secondary"><i class="fa fa-eraser"></i> Clear</button>
        </form>
    </section>
@endsection