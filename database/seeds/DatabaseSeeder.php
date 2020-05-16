<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class,100)->create();
        factory(\App\Models\Post::class,1500)->create();
        factory(\App\Models\Category::class,10)->create();
        factory(\App\Models\Tag::class,50)->create();
        factory(\App\Models\Image::class,2500)->create();
        factory(\App\Models\Video::class,500)->create();
        factory(\App\Models\Comment::class,2500)->create();
    }
}
