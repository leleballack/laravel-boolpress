@extends('layouts.app')

@section('content')
<div class="container text-center">
  <h1 class="text-center">"{{ $blog->title }}"</h1>
  <h4>{{ $blog->content }}</h4>
  <p><em>Written by <strong>{{ $blog->author }}</strong>, on {{ $blog->created_at->format('d-m-Y') }} - Topic: {{ $blog->topic->name }}</em></small>
</div>

@endsection
