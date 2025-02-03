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
        $trainer_ids = User::role('trainer')->get();
        return [
            //
           'title' => fake()->randomElement([
                'Advanced Leadership Workshop',
                'Cybersecurity Best Practices',
                'Agile Project Management',
                'Data Science for Business',
                'Effective Communication Skills',
                'Machine Learning Fundamentals',
                'Customer Service Excellence',
                'Full-Stack Web Development Bootcamp'
            ]),

            'training_type' => fake()->randomElement(['Internal', 'External']),

            'description' => fake()->randomElement([
                'This intensive workshop covers key leadership strategies to improve team performance and decision-making.',
                'Learn essential cybersecurity practices to protect your organization from threats and data breaches.',
                'A comprehensive guide to Agile methodologies, including Scrum, Kanban, and Lean principles.',
                'Explore real-world applications of data science in business decision-making and strategy.',
                'Enhance your communication skills to boost workplace productivity and team collaboration.',
                'Gain a fundamental understanding of machine learning techniques and their business applications.',
                'Develop top-tier customer service skills to improve customer satisfaction and retention.',
                'Master front-end and back-end development with hands-on coding projects and real-world examples.'
            ]),

            'image' => fake()->randomElement([
                'https://source.unsplash.com/640x480/?training,workshop',
                'https://source.unsplash.com/640x480/?business,conference',
                'https://source.unsplash.com/640x480/?technology,education',
                'https://source.unsplash.com/640x480/?leadership,teamwork',
                'https://source.unsplash.com/640x480/?cybersecurity,computer'
            ]),

            'user_id' => fake()->randomElement($trainer_ids), // Random trainer ID

            'max_participants' => fake()->numberBetween(15, 50), // Adjusted range for realism

            'location' => fake()->randomElement([
                'New York, USA',
                'London, UK',
                'Toronto, Canada',
                'Sydney, Australia',
                'Berlin, Germany',
                'Dubai, UAE'
            ]),

            'start_date' => $startDate = fake()->dateTimeBetween('+1 week', '+1 month'),

            'end_date' => fake()->dateTimeBetween($startDate->format('Y-m-d').' +3 days', $startDate->format('Y-m-d').' +2 weeks'),
        ];
    }
}
