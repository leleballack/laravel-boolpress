<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_tag', function (Blueprint $table) {
            $table->integer('blog_id')->unsigned();
            $table->integer("tag_id")->unsigned();
            $table->foreign("blog_id")->references("id")->on("blogs");
            $table->foreign("tag_id")->references("id")->on("tags");
            $table->primary(["blog_id", "tag_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_tag');
    }
}
