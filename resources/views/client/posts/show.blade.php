@php
  /** @var $post \App\Models\Post */
@endphp

@extends('layouts.auth-template')
@section('title')
  {{__('Posts')}}
@endsection
@section('content')
  <div id="posts-page">
    <div class="container mt-5">
      <div class="col-lg-6 col-12 mx-auto">
        <section>
          <img class="mb-5" src="/storage/posts_thumbnails/{{ $post->getThumbnailFileName() }}" alt="{{ $post->getTitleByLocale() }}">
          <h1>{{ $post->getTitleByLocale() }}</h1>
          <p class="text-muted">
            <i class="fa fa-clock me-2"></i>{{__('Posted at')}} {{ $post->getCreatedAt()->format('m/d/Y h:i A') }}
            <i class="fa fa-flag ms-3 me-2"></i>{{__('Trending on')}} <strong>{{ $post->getCountry()->getNiceName() }}</strong>
          </p>
          <p>{!! $post->getContentByLocale() !!}</p>
        </section>
      </div>
    </div>
  </div>
@endsection