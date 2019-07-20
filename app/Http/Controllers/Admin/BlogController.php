<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use App\Topic;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
      $blogs = Blog::all();
      return view("admin.index", compact("blogs"));
    }

    public function create()
    {
        $topics = Topic::all();
        return view ("admin.create", compact("topics"));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
          "title" => "required|unique:blogs|bail|max:255",
          "author" => "required|max:255",
          "content" => "required|min:50",
          "topic_id" => "required"
        ]);
        $data = $request->all();
        $slug = Str::slug($data["title"]);
        $data["slug"] = $slug;
        // dd($data);
        $newblog = new Blog();
        $newblog->fill($data);
        $newblog->save();
        return redirect()->route("admin.blogs.index");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
