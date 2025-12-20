<?php

test('anyone can view a course', function () {

    $course = \App\Models\Course::factory()->create();

    $response = $this->get('/courses/' . $course->key);

    $response->assertStatus(200);
});
