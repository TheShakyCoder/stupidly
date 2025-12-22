<?php

use App\Models\Lesson;
use Inertia\Testing\AssertableInertia;

test('anyone can view a Lesson', function () {
    $lesson = Lesson::factory()->create();

    $this
        ->get(sprintf('/lessons/%s', $lesson->id))

        ->assertStatus(200)
        ->assertInertia(fn(AssertableInertia $ai) => $ai
            ->component('Lesson/Show')
        );
});
