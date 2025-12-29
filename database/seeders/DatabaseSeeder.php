<?php

namespace Database\Seeders;

use App\Models\Month;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = collect(config('seeder.users'));
        foreach ($users as $userData) {
            User::create([
                ...$userData,
                'password' => Hash::make(config('auth.user.password')),
            ]);
        }


        $months = collect(config('seeder.months'));
        foreach ($months as $month) {
            Month::create($month);
        }

        $courses = collect(config('seeder.courses'));
        foreach ($courses as $courseKey => $courseData) {
            $tutor = $courseData['tutor'] ?? null;
            $skills = $courseData['skills'] ?? [];
            $lessons = $courseData['lessons'] ?? [];
            $bullets = $courseData['bullets'] ?? [];
            unset($courseData['tutor'], $courseData['skills'], $courseData['lessons'], $courseData['bullets']);

            $course = \App\Models\Course::create(
                array_merge(['key' => $courseKey, 'user_id' => User::where('name', $tutor)->first()->id], $courseData)
            );

            if ($tutor) {
                $userModel = User::firstOrCreate(['name' => $tutor]);
                $course->user()->associate($userModel);
                $course->save();
            }

            foreach ($skills as $skillName) {
                $skillModel = \App\Models\Skill::firstOrCreate(['name' => $skillName]);
                $course->skills()->attach($skillModel);
            }
            foreach ($lessons as $lessonData) {
                $startOfMonth = Carbon::createFromFormat('Y-m-d H:i:s', $lessonData['available_at'])->startOfMonth();
                $month = Month::where('started_at', $startOfMonth->format('Y-m-d'))->first();

                $course->lessons()->create([
                    'available_at' => $lessonData['available_at'],
                    'title' => $lessonData['title'],
                    'month_id' => $month->id
                ]);
            }
            foreach ($bullets as $bulletData) {
                $course->bullets()->create(['name' => $bulletData]);
            }
        }

    }
}
