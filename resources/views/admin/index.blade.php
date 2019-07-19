@extends('layouts.app')

@section('content')
<div class="container text-center">
  <h1>All Blog Posts</h1>
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th style="width: 25%">Title</th>
        <th>Author</th>
        <th style="width: 25%">Slug</th>
        <th>Topic</th>
        <th>Created</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($blogs as $blog)
        <tr>
          <th>{{ $blog->id }}</th>
          <td>{{ $blog->title }}</td>
          <td>{{ $blog->author }}</td>
          <td>{{ $blog->slug }}</td>
          {{-- <td>{{ $blog->topic->id }}</td> --}}
          <td>{{ $blog->created_at->format('d-m-y') }}</td>
        </tr>
      @endforeach


    </tbody>
  </table>
</div>

@endsection
