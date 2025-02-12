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

            'image' => fake()->unique()->randomElement([
                'https://cdn.dribbble.com/userupload/24948738/file/original-ad010e4d2c92e55b1649db5a1676d2bd.jpg?resize=1504x1128&vertical=center',
                'https://cdn.dribbble.com/userupload/23443859/file/original-d03b3c9846e8a36a861903489e9a426c.png?resize=1504x1128&vertical=center',
                'https://cdn.dribbble.com/userupload/2999484/file/original-7064877ce42f47033be7b9782a562fa6.png?resize=1504x847&vertical=center',
                'https://cdn.dribbble.com/userupload/4143912/file/original-6f88b78f2d9a4a9c47c3430664f16e0e.png?resize=1504x846&vertical=center',
                'https://cdn.dribbble.com/userupload/2999482/file/original-b6fa5d1582046dfd653080959c067efc.png?resize=1504x846&vertical=center'
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
