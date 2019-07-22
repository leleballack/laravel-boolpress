@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="text-center">All Blog Posts</h1>
  <ul>
  @forelse ($blogs as $blog)
      <li>
        <a href="{{ route("blogs.show", $blog->slug) }}">{{ $blog->title }}</a>
         - written by {{ $blog->author }},
         on {{ $blog->created_at->format('d-m-Y') }}
         @if ($blog->topic)
           (in <a href="{{ route('blogs.topic', $blog->topic->slug) }}">{{ $blog->topic->name }}</a>)
         @endif
         @if (($blog->tags)->isNotEmpty())
           @foreach ($blog->tags as $tag)
             {#<a href="{{ route('blogs.tags', $tag->slug) }}">{{ $tag->name }}</a>}
           @endforeach
         @endif
  @empty
    <h2>There are no results</h2>
  @endforelse
  </ul>
  {{ $blogs->links() }}
</div>

@endsection
