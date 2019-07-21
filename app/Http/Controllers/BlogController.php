<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Topic;
use App\Tag;

class BlogController extends Controller
{
    public function show($slug)
    {
        $blog = Blog::where("slug", $slug)->first();
        return view("blog.show", compact("blog"));
    }

    public function showTopic($slug)
    {
      $topic = Topic::where("slug", $slug)->first();
      $blogs = $topic->blogs;
      return view("blog.topic", compact("topic", "blogs"));
    }

    public function showTags($slug)
    {
      $tags = Tag::where("slug", $slug)->first();
      $blogs = $tags->blogs;
      return view("blog.tags", compact("tags", "blogs"));
    }
}
