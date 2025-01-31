<?php

namespace Database\Factories\Training;

use App\Models\Training\Training;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Training\TrainingRequest>
 */
class TrainingRequestFactory extends Factory
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
            'user_id' => User::factory(), // Creates an associated User instance
            'training_id' => Training::factory(),
            'title' => $this->faker->word, // Generates a random word for the badge title
            'description' => $this->faker->text, // Generates a random description
            'status' => $this->faker->randomElement(['active', 'inactive', 'pending']), // Randomly selects one of the statuses
        ];
    }
}
