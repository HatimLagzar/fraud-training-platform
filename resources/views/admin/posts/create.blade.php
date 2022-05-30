@php
    /** @var $countries \App\Models\Country[] */
@endphp
@extends('admin.layouts.auth-template')
@section('title')
    Create Post
@endsection
@section('content')
    <section class="my-3">
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach

        <h2>Create Post</h2>
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="titleENInput" class="form-label">Title EN</label>
                <input id="titleENInput"
                       name="title"
                       class="form-control"
                       placeholder="Place your title here"
                       required>
            </div>

            <div class="form-group mb-3">
                <label for="titleFRInput" class="form-label">Title FR</label>
                <input id="titleFRInput"
                       name="title_fr"
                       class="form-control"
                       placeholder="Place your title here"
                       required>
            </div>

            <div class="form-group mb-3">
                <label for="titleESInput" class="form-label">Title ES</label>
                <input id="titleESInput"
                       name="title_es"
                       class="form-control"
                       placeholder="Place your title here"
                       required>
            </div>

            <div class="form-group mb-3">
                <label for="titleITInput" class="form-label">Title IT</label>
                <input id="titleITInput"
                       name="title_it"
                       class="form-control"
                       placeholder="Place your title here"
                       required>
            </div>

            <div class="form-group mb-3">
                <label for="titleDEInput" class="form-label">Title DE</label>
                <input id="titleDEInput"
                       name="title_de"
                       class="form-control"
                       placeholder="Place your title here"
                       required>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">Content EN</label>
                <textarea id="editor_en"
                          name="description"
                          class="form-control"
                          placeholder="Place your post here"></textarea>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">Content FR</label>
                <textarea id="editor_fr"
                          name="description_fr"
                          class="form-control"
                          placeholder="Place your post here"></textarea>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">Content ES</label>
                <textarea id="editor_es"
                          name="description_es"
                          class="form-control"
                          placeholder="Place your post here"></textarea>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">Content IT</label>
                <textarea id="editor_it"
                          name="description_it"
                          class="form-control"
                          placeholder="Place your post here"></textarea>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">Content DE</label>
                <textarea id="editor_de"
                          name="description_de"
                          class="form-control"
                          placeholder="Place your post here"></textarea>
            </div>

            <div class="form-group mb-3">
                <label for="country" class="form-label">Country</label>
                <select name="country_id" id="country" class="form-select">
                    <option>Select Country</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->getId() }}">{{ $country->getNiceName() }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Thumbnail</label>
                <input class="form-control" type="file" id="formFile" name="thumbnail" accept="image/*" required>
            </div>

            <button class="btn btn-primary"><i class="fa fa-paper-plane"></i> Create</button>
        </form>
    </section>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor_en'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor_fr'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor_es'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor_it'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor_de'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection