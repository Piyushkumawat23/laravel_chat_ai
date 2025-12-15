<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            [
                'title' => 'Laravel Basics',
                'description' => 'Learn Laravel from scratch',
                'chatbot_prompt' => 'You are a Laravel teacher. Explain concepts simply.',
                'status' => 1,
            ],
            [
                'title' => 'Advanced Laravel',
                'description' => 'Deep dive into Laravel advanced topics',
                'chatbot_prompt' => 'You are an expert Laravel mentor.',
                'status' => 1,
            ],
            [
                'title' => 'PHP Fundamentals',
                'description' => 'Core PHP programming concepts',
                'chatbot_prompt' => 'You are a PHP instructor.',
                'status' => 0,
            ],
        ];

        foreach ($courses as $course) {
            Course::updateOrCreate(
                ['slug' => Str::slug($course['title'])],
                [
                    'title' => $course['title'],
                    'slug' => Str::slug($course['title']),
                    'description' => $course['description'],
                    'chatbot_prompt' => $course['chatbot_prompt'],
                    'status' => $course['status'],
                ]
            );
        }
    }
}
