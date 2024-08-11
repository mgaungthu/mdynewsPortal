<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        // Create 10 articles
        \App\Models\Portal::factory(1)->create()->each(function ($portal) {
            // Create 3 categories per portal
            $categories = Category::factory(3)->create(['portal_id' => $portal->id]);

            // Create 10 articles per portal
            $articles = Article::factory(5)->create(['portal_id' => $portal->id])->each(function ($article) use ($categories) {
                // Attach random categories to each article
                $article->categories()->attach($categories->random(2)->pluck('id'));

                // Create 5 comments per article
                Comment::factory(5)->create(['article_id' => $article->id]);
            });
        });
    }
}
