@extends('layouts.app')

@section('content')
  <div class="container">
    <h1 class="mb-5">Edit This Post: "{{ $blog->title }}"</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route("admin.blogs.update", $blog->slug) }}" method="POST">
      @method("PUT")
      @csrf

      <div class="form-group">
        <label>Title</label>
        <input name="title" value="{{ $blog->title, old("title") }}" type="text" class="form-control" placeholder="Title">
      </div>

      <div class="form-group">
        <label>Author</label>
        <input name="author" value="{{ $blog->author, old("author") }}" type="text" class="form-control" placeholder="Author">
      </div>

      <div class="form-group">
        <label>Content</label>
        <textarea name="content" class="form-control" placeholder="Write your content here" rows="3" cols="80">{{ $blog->content, old("content") }}</textarea>
      </div>

      <div class="form-group">
        <select class="form-control" name="topic_id">
          <option value="" selected disabled>Select Your Topic</option>
          @foreach ($topics as $topic)
            <option value="{{ $topic ? $topic->id : 0 }}">{{ $topic ? $topic->name : "" }}</option>
          @endforeach
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection
