<?php

namespace Database\Seeders;

use App\Models\Month;
use App\Models\Skill;
use App\Models\Tutor;
use App\Models\User;
use Carbon\Carbon;
use Hash;
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
        $users = collect(config('seeder.users'));
        foreach ($users as $userData) {
            $tutor = $userData['tutor'] ?? null;
            unset($userData['tutor']);
            $user = User::create([
                ...$userData,
                'password' => Hash::make(config('auth.user.password')),
            ]);
            if ($tutor) {
                $user->tutor()->create([
                    'title' => $tutor['title'],
                    'bio' => $tutor['bio'],
                ]);
            }
        }

        $skills = collect(config('seeder.skills'));
        foreach ($skills as $skillName) {
            Skill::create(['name' => $skillName]);
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
            $requirements = $courseData['requirements'] ?? [];
            unset(
                $courseData['tutor'], 
                $courseData['skills'], 
                $courseData['lessons'], 
                $courseData['bullets'],
                $courseData['requirements']
            );

            $course = \App\Models\Course::create(
                array_merge(['key' => $courseKey, 'tutor_id' => Tutor::whereHas('user', function ($query) use ($tutor) {
                    $query->where('name', $tutor);
                })->first()->id], $courseData)
            );

            if ($tutor) {
                $userModel = User::firstOrCreate(['name' => $tutor]);
                $course->tutor()->associate($userModel);
                $course->save();
            }

            foreach ($skills as $skillName) {
                $skillModel = Skill::firstOrCreate(['name' => $skillName]);
                $course->skills()->attach($skillModel);
            }
            foreach ($lessons as $lessonData) {
                $startOfMonth = Carbon::createFromFormat('Y-m-d H:i:s', $lessonData['available_at'])->startOfMonth();
                $month = Month::where('started_at', $startOfMonth->format('Y-m-d'))->first();

                $course->lessons()->create([
                    'available_at' => $lessonData['available_at'],
                    'title' => $lessonData['title'],
                    'month_id' => $month->id,
                ]);
            }
            foreach ($bullets as $bulletData) {
                $course->bullets()->create(['name' => $bulletData]);
            }

            foreach ($requirements as $requirementData) {
                $course->requirements()->create(['name' => $requirementData]);
            }
        }

    }
}
