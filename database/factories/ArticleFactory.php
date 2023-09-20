<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id'=>fake()->numberBetween(1,3) ,
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'images'=> fake()->image(null,1900,1200),
            'description'=>fake()->paragraph()
        ];
    }
}
