@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Create New Post</h1>
    <form>
      <div class="form-group">
        <label>Title</label>
        <input name="title" type="text" class="form-control" placeholder="Title">
      </div>
      <div class="form-group">
        <label>Author</label>
        <input name="author" type="text" class="form-control" placeholder="Author">
      </div>
      <div class="form-group">
        <label>Content</label>
        <input name="content" type="text" class="form-control" placeholder="Write your content here">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>


  </div>
@endsection
