<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LinkCategoryBlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("blogs", function(Blueprint $table) {
          $table->integer("topic_id")->unsigned()->after("id")->nullable();
          $table->foreign("topic_id")->references("id")->on("topics");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table("blogs", function(Blueprint $table) {
        $table->dropforeign("blogs_topic_id_foreign");
        $table->dropColumn("topic_id");
      });
    }
}
