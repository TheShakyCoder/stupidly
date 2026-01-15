<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ParentGuideTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_parent_guide_page_can_be_rendered()
    {
        $response = $this->get('/parent-guide');

        $response->assertStatus(200);
    }
}
