<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use App\Topic;

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
        //
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
