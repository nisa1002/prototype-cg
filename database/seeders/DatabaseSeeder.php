<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        PostCategory::create([
            'name' => 'Sosical',
            'slug' => 'sosical',
        ]);
        PostCategory::create([
            'name' => 'Menfest',
            'slug' => 'menfest',
        ]);
        Post::factory(20)->create();
        Comment::factory(100)->create();
    }
}
