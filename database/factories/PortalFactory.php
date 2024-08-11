<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Portal>
 */
class PortalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // return [
        //     'user_id' => \App\Models\User::inRandomOrder()->first()->id, // Assuming you have a UserFactory
        //     'title' => $this->faker->company,
        //     'description' => $this->faker->catchPhrase,
        //     'banner_image' => $this->faker->imageUrl(1200, 300, 'banner', true),
        //     'logo' => $this->faker->imageUrl(100, 100, 'logo', true),
        //     'theme' => 'default',
        // ];
        return [
            'user_id' => 2, // Assuming you have a UserFactory
            'title' => $this->faker->company,
            'description' => $this->faker->catchPhrase,
            'banner_image' => $this->faker->imageUrl(1200, 300, 'banner', true),
            'logo' => $this->faker->imageUrl(100, 100, 'logo', true),
            'theme' => 'default',
        ];
    }
}
