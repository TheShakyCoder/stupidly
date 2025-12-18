<?php

use Inertia\Testing\AssertableInertia;

test('a collection of tutors can be fetched', function () {
    \App\Models\Tutor::factory()->count(15)->create();

    $response = $this->get('/tutors');

    $response->assertStatus(200);
    $response->assertInertia(fn(AssertableInertia $in) => $in
        ->has('tutors', fn(AssertableInertia $in) => $in
            ->has('data', 10)
            ->etc()
        )
    );
});
