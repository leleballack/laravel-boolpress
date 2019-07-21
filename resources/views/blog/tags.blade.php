@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="text-center">All Blog Posts about: {{ $tags->name }}</h1>
  <ul>
  @forelse ($blogs as $blog)
      <li>
        <a href="{{ route("blogs.show", $blog->slug) }}">{{ $blog->title }}</a>
        - written by {{ $blog->author }},
        on {{ $blog->created_at->format('d-m-Y') }}
        (in <a href="{{ route('blogs.topic', $blog->topic->slug) }}">{{ $blog->topic->name }}</a>)
        @foreach ($blog->tags as $tag)
          {#<a href="{{ route('blogs.tags', $tag->slug) }}">{{ $tag->name }}</a>}
        @endforeach
      </li>
  @empty
    <h2>There are no results</h2>
  @endforelse
  </ul>
</div>

@endsection
