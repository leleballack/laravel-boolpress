<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
Use App\Blog;
use Illuminate\Support\Str;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 30 ; $i++) {
          $newBlog = new Blog();
          $newBlog->title = $faker->sentence();
          $newBlog->content = $faker->text(1500);
          $newBlog->author = $faker->firstName ." ". $faker->lastName;
          $newBlog->slug = Str::slug($newBlog->title, '-');
          $newBlog->save();
        }
    }
}
