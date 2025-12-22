<?php

use App\Models\Cover;
use App\Models\Skill;
use App\Models\Course;
use Inertia\Testing\AssertableInertia;

test('anyone can view the list of courses grouped by skill', function () {

    $skills = Skill::factory()->count(5)->create();
    $courses = Course::factory()
        ->has(\App\Models\Lesson::factory()->count(rand(0, 3)), 'lessons')
        ->has(\App\Models\Rating::factory()->count(rand(0, 10)), 'ratings')
        ->count(15)->create();
    $skills->each(function ($skill) use ($courses) {
        $assignedCourses = $courses->random(rand(1, 3));
        foreach ($assignedCourses as $course) {
            Cover::factory()->create([
                'skill_id' => $skill->id,
                'course_id' => $course->id,
            ]);
        }
    });

    $response = $this->get('/skills');

    $response->assertStatus(200)
        ->assertInertia(fn(AssertableInertia $ai) => $ai
            ->component('Skill/Index')
            ->has('skills', 5, fn(AssertableInertia $ai) => $ai
                ->has('name')
                ->has('courses')
                ->etc()
            )
        );
});
