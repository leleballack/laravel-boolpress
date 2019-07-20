<?php


Auth::routes();

Route::get('/', "HomeController@index")->name("home");

Route::get("blogs/{slug}", "BlogController@show")->name("blogs.show");
Route::get("topics/{slug}", "BlogController@showTopic")->name("blogs.topic");



Route::middleware("auth")->prefix("admin")->namespace("Admin")->name("admin.")->group(function() {
  Route::get('/', 'HomeController@index')->name('home');
  Route::resource("blogs", "BlogController");

});
