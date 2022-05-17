<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        News::factory()->count(20)->create();
        Category::factory()->count(5)->create();
        Comment::factory()->count(40)->create();

        User::factory()->create([
            "name"=>"Alice",
            "email"=>"alice@gmail.com",
            "role"=>"user",
        ]);

        User::factory()->create([
            "name"=>"Bob",
            "email"=>"bob@gmail.com",
            "role"=>"user",
        ]);

        User::factory()->create([
            "name"=>"Khoon Set Hainn",
            "email"=>"appleangle@gmail.com",
            "role"=>"admin",
        
        ]);

    }
}
