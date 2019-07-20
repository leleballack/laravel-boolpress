<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
  public function blogs() {
    return $this->hasMany("App\Blog");
  }
}
