<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class TagFactory extends Factory {
    public function definition(): array
    {
        $word = fake()->unique()->word;
        return [
            'label' => $word,
            'url' => $word
        ];
    }
}
