<?php

use Inertia\Testing\AssertableInertia;

test('anyone can view the list of courses', function () {
    $response = $this->get('/courses');

    $response->assertStatus(200)
    ->assertInertia(fn(AssertableInertia $ai) => $ai
        ->component('Course/Index')
        ->has('courses.data')
    );
});
