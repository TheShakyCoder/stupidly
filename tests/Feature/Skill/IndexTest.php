<?php

use App\Models\Skill;

test('anyone can view the Skill index page', function () {

    Skill::factory()->count(5)->create();

    $this
        ->get('/skills')

        ->assertStatus(200)
        ->assertInertia(fn(\Inertia\Testing\AssertableInertia $ai) => $ai
        ->component('Skill/Index')
        ->has('skills', 5)
    );
});
