<?php

namespace Database\Factories\Training;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Training\Badge>
 */
class BadgeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => User::factory(), // Create an associated User instance
            'title' => $this->faker->word, // Generate a random word for the badge title
            'description' => $this->faker->text, // Generate a random description
        ];
    }
}
