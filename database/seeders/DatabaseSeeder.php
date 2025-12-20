<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $courses = collect(config('seeder.courses'));
        foreach ($courses as $courseKey => $courseData) {
            $course = \App\Models\Course::create(array_merge(['key' => $courseKey], $courseData));
        }
    }
}
