<?php

namespace Database\Factories;

use App\Models\Comment;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{

    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'article_id' => \App\Models\Article::factory(),
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'content' => $this->faker->sentence,
            'is_approved' => $this->faker->boolean,
        ];
    }
}
