<?php

use App\Models\Course;
use Inertia\Testing\AssertableInertia;

test('anyone can view the list of courses', function () {
    $skills = \App\Models\Skill::factory()->count(5)->create();
    $courses = Course::factory()->recycle($skills)->count(15)->create();

    $response = $this->get('/courses');

    $response->assertStatus(200)
    ->assertInertia(fn(AssertableInertia $ai) => $ai
        ->component('Course/Index')
        ->has('courses', 15,fn(AssertableInertia $ai) => $ai

            ->whereType('key', 'string')
            ->where('key', $courses[0]->key)
            ->whereType('title', 'string')
            ->whereType('description', 'string')
            ->whereType('level', 'string')
            ->whereType('user_id', 'integer')

            ->etc()
        )
    );
});
