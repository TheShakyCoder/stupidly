<?php

use App\Models\Month;
use Inertia\Testing\AssertableInertia;

test('anyone can view a month', function () {
    $month = Month::factory()->create();

    $response = $this->get('/months/' . $month->id);

    $response->assertStatus(200);
    $response->assertInertia(
        fn(AssertableInertia $ai) => $ai
            ->component('Month/Show')
            ->has(
                'month',
                fn(AssertableInertia $ai) => $ai
                    ->has('lessons')
                    ->etc()
            )
    );
});
