<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function Topic() {
      return $this->belongsTo("App\Topic");
    }
}
