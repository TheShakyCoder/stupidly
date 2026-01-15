<?php

use Inertia\Testing\AssertableInertia;

test('anyone can view a course', function () {

    $course = \App\Models\Course::factory()
        ->has(\App\Models\Skill::factory()->count(3), 'skills')
        ->has(\App\Models\Bullet::factory()->count(4), 'bullets')
        ->create();

    $response = $this->get('/courses/'.$course->key);

    $response->assertStatus(200)
        ->assertInertia(
            fn (AssertableInertia $ai) => $ai
                ->component('Course/Show')
                ->has(
                    'course',
                    fn (AssertableInertia $ai) => $ai
                        ->where('key', $course->key)
                        ->where('title', $course->title)
                        ->where('synopsis', $course->synopsis)
                        ->where('description', $course->description)
                        ->where('level', $course->level)
                        ->where('user_id', $course->user_id)
                        ->has('skills', 3)
                        ->has('lessons')
                        ->has(
                            'bullets',
                            4,
                            fn (AssertableInertia $ai) => $ai
                                ->has('name')
                                ->etc()
                        )
                        ->etc()
                )
        );
});
