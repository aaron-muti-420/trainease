<?php

namespace Database\Factories\Training;

use App\Models\Training\Training;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Training\Enrollment>
 */
class EnrollmentFactory extends Factory
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
            'user_id' => User::factory(),
            'training_id' => Training::factory(),
            'status' => $this->faker->randomElement(['pending', 'approved', 'completed']),
            'enrolled_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
