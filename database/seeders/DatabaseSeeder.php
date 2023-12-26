<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::truncate();
        Post::truncate();
        Category::truncate();

        $user1 = User::factory()->create([
            'name' => 'Foo'
        ]);

        $category1 = Category::factory()->create([
            'name' => 'Work'
        ]);
        
        Post::factory(3)->create([
            'user_id' => $user1->id,
            'category_id' => $category1->id,
        ]);

        $user = User::factory()->create([
            'name' => 'Bar'
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
    }
}
