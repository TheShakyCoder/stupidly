<?php

use App\Models\Skill;
use App\Models\Course;
use Inertia\Testing\AssertableInertia;

test('anyone can view the list of courses grouped by skill', function () {
    $skills = Skill::factory()->count(5)->create();
    $courses = Course::factory()
        ->has(\App\Models\Lesson::factory()->count(rand(0, 1)))
        ->has(\App\Models\Rating::factory()->count(rand(0, 10)))

        ->recycle($skills)
        ->count(15)
        ->create();

    $response = $this->get('/skills');

    $response->assertStatus(200)
        ->assertInertia(fn(AssertableInertia $ai) => $ai
            ->component('Skill/Index')
            ->has('skills', 5, fn(AssertableInertia $ai) => $ai
                ->has('name')
                ->has('courses', fn(AssertableInertia $ai) => $ai
                    ->has('ratings', count($courses[0]->ratings) ?? 0, fn(AssertableInertia $ai) => $ai
                        ->whereType('id', 'integer')
                        ->whereType('user_id', 'integer')
                        ->whereType('course_id', 'integer')
                        ->whereType('score', 'integer')
                        ->etc()
                    )
                    ->has('lessons',  count($courses[0]->lessons) ?? 0)
                    ->etc()
                )
                ->etc()
            )
        );
});
