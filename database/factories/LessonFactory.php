<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Month;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'month_id' => Month::factory(),
            'available_at' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'title' => $this->faker->title,
            'path' => $this->faker->url,
        ];
    }
}
