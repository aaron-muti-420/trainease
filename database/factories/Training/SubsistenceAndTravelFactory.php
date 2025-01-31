<?php

namespace Database\Factories\Training;

use App\Models\Training\Training;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Training\SubsistenceAndTravel>
 */
class SubsistenceAndTravelFactory extends Factory
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
            'user_id' => User::factory(), // Generates a random associated User
            'training_id' => Training::factory(), // Generates a random associated Training
            'departure_date' => $this->faker->date(), // Generates a random departure date
            'return_date' => $this->faker->date(), // Generates a random return date
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']), // Randomly selects a status
            'costs' => $this->faker->randomFloat(2, 100, 1000), // Random costs between 100 and 1000 with 2 decimal places
        ];
    }
}
