<?php

use Inertia\Testing\AssertableInertia;

test('anyone can view a course', function () {

    $course = \App\Models\Course::factory()->create();

    $response = $this->get('/courses/' . $course->key);

    $response->assertStatus(200)
    ->assertInertia(fn(AssertableInertia $ai) => $ai
        ->component('Course/Show')
        ->where('course.key', $course->key)
        ->where('course.title', $course->title)
        ->where('course.description', $course->description)
        ->where('course.level', $course->level)
        ->where('course.user_id', $course->user_id)
    );
});
