<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use App\Topic;
use App\Tag;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
      $blogs = Blog::paginate(5);
      return view("admin.index", compact("blogs"));
    }

    public function create()
    {
        $topics = Topic::all();
        $tags = Tag::all();
        return view ("admin.create", compact("topics", "tags"));
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

        $newblog->tags()->sync($data["tags"]);

        return redirect()->route("admin.blogs.index");
    }

    public function show($slug)
    {
      $blog = Blog::where("slug", $slug)->first();
      return view("admin.show", compact("blog"));
    }

    public function edit($slug)
    {
        $blog = Blog::where("slug", $slug)->first();
        $topics = Topic::all();
        $tags = Tag::all();
        return view("admin.edit", compact("blog", "topics", "tags"));
    }

    public function update(Request $request, $slug)
    {
      $validator = $request->validate([
        "title" => "required|bail|max:255",
        "author" => "required|max:255",
        "content" => "required|min:50",
        "topic_id" => "required"
      ]);
      $info = $request->all();
      $blog = Blog::where("slug", $slug)->first();
      // dd($data);
      $blog->update($info);

      $blog->tags()->sync($info["tags"]);

      return redirect()->route("admin.blogs.index");
    }

    public function destroy($slug)
    {
        $blog = Blog::where("slug", $slug)->first();
        $blog->delete();
        return redirect()->route("admin.blogs.index");
    }
}
