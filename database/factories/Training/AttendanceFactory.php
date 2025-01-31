<?php

namespace Database\Factories\Training;

use App\Models\Training\Enrollment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Training\Attendance>
 */
class AttendanceFactory extends Factory
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
            'enrollment_id' => Enrollment::factory(),
            'date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['present', 'absent', 'late']),

        ];
    }
}
