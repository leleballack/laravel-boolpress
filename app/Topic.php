<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
  public function Blog() {
    return $this->hasMany("App\Blog");
  }
}
