<?php

namespace Database\Factories\Training;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Training\Training>
 */
class TrainingFactory extends Factory
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
            'title' => $this->faker->sentence(3),
            'training_type' => $this->faker->randomElement(['Internal', 'External']),
            'description' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl(640, 480, 'education', true, 'training'),
            'user_id' => User::factory(), // Assumes trainers are users
            'max_participants' => $this->faker->numberBetween(10, 50),
            'location' => $this->faker->city(),
            'start_date' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'end_date' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
        ];
    }
}
