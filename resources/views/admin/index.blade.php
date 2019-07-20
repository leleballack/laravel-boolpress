@extends('layouts.app')

@section('content')
<div class="container text-center">
  <h1>All Blog Posts</h1>
  <a href="#" class="btn btn-success">Add New Post</a>
  <table class="table">
    <thead class="text-center">
      <tr>
        <th>#</th>
        <th style="width: 20%">Title</th>
        <th>Author</th>
        <th style="width: 25%">Slug</th>
        <th>Topic</th>
        <th>Created</th>
        <th style="width: 20%">Actions</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($blogs as $blog)
        <tr>
          <th>{{ $blog->id }}</th>
          <td>{{ $blog->title }}</td>
          <td>{{ $blog->author }}</td>
          <td>{{ $blog->slug }}</td>
          <td>
            @if ($blog->topic)
              <a href="{{ route('blogs.topic', $blog->topic->slug) }}">{{ $blog->topic->name }}</a>
             @else
               -
            @endif
          <td>{{ $blog->created_at->format('d-m-y') }}</td>
          <td>
            <a href="#" class="btn btn-primary">Show</a>
            <a href="#" class="btn btn-warning">Edit</a>
            <a href="#" class="btn btn-danger">Delete</a>
          </td>
        </tr>
      @endforeach


    </tbody>
  </table>
</div>

@endsection
