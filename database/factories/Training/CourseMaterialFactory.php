<?php

namespace Database\Factories\Training;

use App\Models\Training\Training;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Training\CourseMaterial>
 */
class CourseMaterialFactory extends Factory
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
            'training_id' => Training::factory(),
            'material_name' => $this->faker->sentence(3),
            'material_type' => $this->faker->randomElement(['pdf', 'video', 'document', 'presentation']),
            'material_url' => $this->faker->url(),
        ];
    }
}
