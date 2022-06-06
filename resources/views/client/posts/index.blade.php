@php
  /** @var $posts \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection */
@endphp

@extends('layouts.auth-template')
@section('title')
  {{__('Posts')}}
@endsection
@section('content')
  <div id="posts-page">
    <div class="container mt-5">
      <section>
        <h1>{{__('Posts List')}}</h1>
        @foreach($posts as $post)
          <div class="post-item mb-5">
            <div class="row">
              <div class="col-lg-3 col-12">
                <img src="/storage/posts_thumbnails/{{ $post->getThumbnailFileName() }}" alt="{{ $post->getTitleByLocale() }}">
              </div>
              <div class="col">
                <h3>{{ $post->getTitleByLocale() }}</h3>
                <p>{!! \Illuminate\Support\Str::limit($post->getExcerptByLocale(), 200) !!}</p>
                <p class="text-muted">
                  <i class="fa fa-clock me-2"></i>{{__('Posted at')}} {{ $post->getCreatedAt()->format('m/d/Y h:i A') }}
                  <i class="fa fa-flag ms-3 me-2"></i>{{__('Trending on')}} <strong>{{ $post->getCountry()->getNiceName() }}</strong>
                </p>
                <a href="{{ route('dashboard.posts.show', ['id' => $post->getId()]) }}" class="btn btn-secondary btn-sm">{{__('Read the document')}}<i class="fa fa-angles-right ms-2"></i></a>
              </div>
            </div>
          </div>
        @endforeach
      </section>
    </div>
  </div>
@endsection