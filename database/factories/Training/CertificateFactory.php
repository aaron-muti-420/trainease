<?php

namespace Database\Factories\Training;

use App\Models\Training\Enrollment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Training\Certificate>
 */
class CertificateFactory extends Factory
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
            'enrollment_id' => Enrollment::factory(), // Assuming you have an Enrollment factory
            'certificate_path' => $this->faker->word . '.pdf', // You can adjust this to generate a realistic file path
            'issued_at' => $this->faker->date(), // Generate a random date
        ];
    }
}
