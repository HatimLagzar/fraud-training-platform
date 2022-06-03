@php
  /** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts */
@endphp

@component('mail::message')
# Newsletter

@foreach($posts as $post)
  <div style="margin-bottom: 10px;">
    <h3>{{ $post->getTitleByLocale() }}</h3>
    <p>{!! $post->getExcerptByLocale() !!}</p>
  </div>
@endforeach

Thanks,<br>
{{ config('app.name') }}
@endcomponent
