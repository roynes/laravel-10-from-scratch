<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Post::truncate();
        Category::truncate();
        Comment::truncate();

        $user1 = User::factory()->create([
            'email' => 'roynes2012@gmail.com',
            'name' => 'Roy Reynes',
            'admin' => true,
            'password' => 'administrator'
        ]);

        $category1 = Category::factory()->create([
            'name' => 'Work'
        ]);
        
        Post::factory(3)->create([
            'user_id' => $user1->id,
            'category_id' => $category1->id,
        ]);

        $user = User::factory()->create([
            'name' => 'Bar',
            'password' => 'password'
        ]);

        $category = Category::factory()->create([
            'name' => 'Personal'
        ]);
        
        Post::factory(5)->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);

        Post::factory(6)->create([
            'user_id' => $user1->id,
            'category_id' => $category->id,
        ]);

        Post::factory(6)->create([
            'user_id' => $user->id,
            'category_id' => $category1->id,
        ]);


        Comment::factory(10)->create([
            'user_id' => $user1->id,
            'post_id' => Post::latest()->first()->id
        ]);
    }
}
