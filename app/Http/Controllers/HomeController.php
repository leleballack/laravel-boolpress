<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class HomeController extends Controller
{
  public function index() {
    $blogs = Blog::paginate(8);
    return view("home", compact("blogs"));
  }
}
