@extends('layouts.app')

@section('content')
<div class="container text-center">

  <h1 class="text-center">"{{ $blog->title }}"</h1>
  <h4>{{ $blog->content }}</h4>
  <p><em>Written by <strong>{{ $blog->author }}</strong>,
    on {{ $blog->created_at->format('d-m-Y') }} <br>
    @if ($blog->topic)
      (<a href="{{ route('blogs.topic', $blog->topic->slug) }}">{{ $blog->topic->name }}</a>)
    @endif
    </em></p>
</div>
@endsection
