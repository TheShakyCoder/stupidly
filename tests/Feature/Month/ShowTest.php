<?php

use App\Models\Lesson;
use App\Models\Month;
use Inertia\Testing\AssertableInertia;

test('anyone can view a month', function () {
    $month = Month::factory()
        ->has(Lesson::factory(), 'lessons')
        ->create();

    $response = $this->get('/months/'.$month->id);

    $response->assertStatus(200);
    $response->assertInertia(
        fn (AssertableInertia $ai) => $ai
            ->component('Month/Show')
            ->has(
                'month',
                fn (AssertableInertia $ai) => $ai
                    ->has(
                        'lessons',
                        fn (AssertableInertia $ai) => $ai
                            ->has(
                                '0.course',
                                fn (AssertableInertia $ai) => $ai
                                    ->has('skills')
                                    ->etc()
                            )
                            ->etc()
                    )
                    ->has('recordings')
                    ->etc()
            )
    );
});
