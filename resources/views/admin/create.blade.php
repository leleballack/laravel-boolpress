@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Create New Post</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route("admin.blogs.store") }}" method="POST">
      @csrf

      <div class="form-group">
        <label>Title</label>
        <input name="title" value="{{ old("title") }}" type="text" class="form-control" placeholder="Title">
      </div>

      <div class="form-group">
        <label>Author</label>
        <input name="author" value="{{ old("author") }}" type="text" class="form-control" placeholder="Author">
      </div>

      <div class="form-group">
        <label>Content</label>
        <textarea name="content" class="form-control" placeholder="Write your content here" rows="3" cols="80">{{ old("content") }}</textarea>
      </div>

      <div class="form-group">
        <select class="form-control" name="topic_id">
          <option value="">Select Your Topic</option>
          @foreach ($topics as $topic)
            <option value="{{ $topic->id }}" {{ old("topic") == $topic->id ? 'selected' : "" }}>{{ $topic->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group text-left">
        @foreach ($tags as $tag)
          <label class="form-check-label">{{ $tag->name }} <input type="checkbox" class="form-check-inline" name="tags[]" value="{{ $tag->id }}"
            {{ (in_array($tag->id, old("tags", array()))) ? "checked" : "" }}></label>
        @endforeach
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection
