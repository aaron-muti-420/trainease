<?php

namespace Database\Factories\Training;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Training\CourseMaterial>
 */
use App\Models\Training\Training;
use App\Models\Training\CourseMaterial;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseMaterialFactory extends Factory
{
    protected $model = CourseMaterial::class;

    public function definition()
    {
        $courseTitles= [
            "Laravel for Beginners: A Comprehensive Guide",
            "Building RESTful APIs with Laravel",
            "Mastering Laravel: Advanced Techniques and Best Practices",
            "Laravel E-commerce Development: Create Your Online Store",
            "Laravel and Vue.js: Building Modern Web Applications",
            "Laravel Testing: Write Effective Tests for Your Applications",
            "Laravel 9: The Complete Guide to Building Web Applications",
            "Laravel Security: Protecting Your Applications from Vulnerabilities",
            "Building Real-Time Applications with Laravel and Pusher",
            "Laravel and Docker: Containerizing Your Applications",
            "Laravel Blade Templating: Creating Dynamic Views",
            "Laravel Authentication and Authorization: Securing Your App",
            "Laravel and GraphQL: Building APIs with Laravel",
            "Laravel Package Development: Create Your Own Packages",
            "Laravel for Freelancers: Building Projects for Clients"
        ];
        $materialType = $this->faker->randomElement(['video', 'text', 'quiz']);
        $materialContent = null;
        $materialUrl = null;
        $duration = null;
        $quizData = null;

        switch ($materialType) {
            case 'video':
                $materialUrl = $this->faker->randomElement([
                    'https://www.youtube.com/embed/sD9Z_SrU85o',
                    'https://www.youtube.com/embed/ud7YxC33Z3w',
                    'https://www.youtube.com/embed/DU8o-OTeoCc'

                ]);
                $duration = $this->faker->numberBetween(60, 3600); // 1 min to 1 hr
                break;

            case 'text':
                $materialContent = $this->faker->text();
                break;

            case 'quiz':
                $quizData = [
                    'title' => 'Sample Quiz',
                    'questions' => [
                        [
                            'question' => 'What is Laravel?',
                            'options' => ['Framework', 'Library', 'Tool'],
                            'correct_answer' => 'Framework',
                        ],
                        [
                            'question' => 'Which command creates a migration?',
                            'options' => ['make:migration', 'create:migration', 'new:migration'],
                            'correct_answer' => 'make:migration',
                        ],
                    ],
                ];
                break;
        }

        return [
            'training_id' => $this->faker->numberBetween(1, Training::count()),
            'material_name' => $this->faker->randomElement($courseTitles),
            'material_type' => $materialType,
            'material_content' => $materialContent,
            'material_url' => $materialUrl,
            'duration' => $duration,
            'quiz_data' => $quizData,
        ];
    }
}
