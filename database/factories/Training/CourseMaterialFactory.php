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
        $materialType = $this->faker->randomElement(['Video', 'Text', 'Quiz']);
        $training_id = Training::all()->pluck('id');



        $materialContent = [];

        $duration = null;


        switch ($materialType) {

            case 'video':

                $materialContent = [

                    'video_url' => $this->faker->url(),

                    'description' => $this->faker->paragraph(),

                ];

                $duration = $this->faker->time('H:i:s'); // Generate a random duration

                break;


            case 'text':

                $materialContent = [

                    'content' => $this->faker->paragraphs(3, true), // Generate a random text content

                ];

                break;


            case 'quiz':

                $materialContent = [

                    'questions' => [

                        [

                            'question' => $this->faker->sentence(),

                            'options' => [

                                $this->faker->sentence(),

                                $this->faker->sentence(),

                                $this->faker->sentence(),

                                $this->faker->sentence(),

                            ],

                            'correct_answer' => $this->faker->sentence(),

                        ],

                        // You can add more questions if needed

                    ],

                ];

                break;

        }


        return [

            'training_id' => fake()->randomElement($training_id),

            'material_name' => $this->faker->sentence(3),

            'material_type' => $materialType,

            'material_content' => json_encode($materialContent), // Store as JSON

            'duration' => $duration,

        ];
    }
}
