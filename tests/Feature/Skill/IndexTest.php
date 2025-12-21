<?php

use App\Models\Skill;
use App\Models\Course;
use Inertia\Testing\AssertableInertia;

test('anyone can view the list of courses grouped by skill', function () {
    $skills = Skill::factory()->count(5)->create();
    $courses = Course::factory()->recycle($skills)->count(15)->create();

    $response = $this->get('/skills');

    $response->assertStatus(200)
        ->assertInertia(fn(AssertableInertia $ai) => $ai
            ->component('Skill/Index')
            ->has('skills', 5, fn(AssertableInertia $ai) => $ai
                ->where('name', $skills[0]->name)
                ->has('courses')
                ->etc()
            )
        );
});
