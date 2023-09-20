<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
          \App\Models\Category::factory(3)->create();
//        \App\Models\Article::factory(1000)->create();
        $articles = \App\Models\Article::factory( 1000)->create();

        $articles->each(function ($article){
            \App\Models\Comment::factory(10)->create(['article_id'=> $article->id]);
        });

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
