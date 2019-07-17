<?php


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});



Route::middleware("auth")->prefix("admin")->namespace("Admin")->name("admin.")->group(function() {
  Route::get('/', 'HomeController@index')->name('home');
  Route::resource("/blogs", "BlogController");

});
