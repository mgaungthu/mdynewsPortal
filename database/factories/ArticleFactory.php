<?php


namespace Database\Factories;


use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition()
    {
        return [
            'portal_id' => \App\Models\Portal::factory(), // Assuming you have a PortalFactory
            'title' => $this->faker->sentence,
            'slug' => Str::slug($this->faker->sentence),
            'content' => $this->faker->paragraphs(3, true),
            'image' => $this->faker->imageUrl(640, 480, 'articles', true), // Example image
            'status' => 'Published',
            'published_at' => now(),
        ];
    }
}
