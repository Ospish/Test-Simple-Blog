<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory {
    public function definition(): array
    {
        return [
            'article_id' => rand(1, 25),
            'title'    => fake()->sentence,
            'body'    => fake()->paragraph,
        ];
    }
}
