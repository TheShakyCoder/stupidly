<?php

use Inertia\Testing\AssertableInertia;

test('a collection of topics can be fetched', function () {
    \App\Models\Topic::factory()->count(15)->create();

    $response = $this->get('/topics');

    $response->assertStatus(200);
    $response->assertInertia(fn(AssertableInertia $in) => $in
        ->has('topics', fn(AssertableInertia $in) => $in
            ->has('data', 10)
            ->etc()
        )
    );

});
