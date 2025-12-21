<?php

use App\Models\Course;
use Inertia\Testing\AssertableInertia;

test('anyone can view the list of courses', function () {
    $skills = \App\Models\Skill::factory()->count(5)->create();
    $courses = Course::factory()->recycle($skills)->count(15)->create();
// dd($courses->toArray());
    $response = $this->get('/courses');

    $response->assertStatus(200)
    ->assertInertia(fn(AssertableInertia $ai) => $ai
        ->component('Course/Index')
        ->has('skills', 5, fn(AssertableInertia $ai) => $ai
            ->where('name', $skills[0]->name)
            ->has('courses')
            ->etc()
        )
        // ->has('courses', 15, fn(AssertableInertia $ai) => $ai
        //     ->where('key', $courses[0]->key)
        //     ->whereType('key', 'string')
        //     ->whereType('title', 'string')
        //     ->whereType('description', 'string')
        //     ->whereType('level', 'string')
        //     ->whereType('user_id', 'integer')
        //     ->etc()
        // )
    );
});
