<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $fillable = ["title", "author", "content", "topic_id", "slug"];

    public function topic() {
      return $this->belongsTo("App\Topic");
    }

    public function tags() {
      return $this->belongsToMany("App\Tag");
    }
}
