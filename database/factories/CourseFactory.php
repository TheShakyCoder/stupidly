<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'key' => $this->faker->unique()->slug(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'tutor_id' => Tutor::factory(),
            'user_id' => User::factory(),
            'level' => $this->faker->randomElement(['Beginner', 'Intermediate', 'Advanced']),
        ];
    }
}
