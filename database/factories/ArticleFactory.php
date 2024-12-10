<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence,
            'body' => fake()->paragraphs(3, true),
            'views' => fake()->randomNumber(3),
            'likes' => fake()->randomNumber(2),
            'created_at' => fake()->dateTime(),
            'updated_at' => fake()->dateTime()
        ];
    }
}
