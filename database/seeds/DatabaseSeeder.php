<?php

use App\{User, Post, Comment};
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
        factory(User::class, 10)->create();

        factory(Post::class, 20)->create();

        factory(Comment::class, 20)->create();
    }
}
