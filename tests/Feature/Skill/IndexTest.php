<?php

test('anyone can view the Skill index page', function () {
    $response = $this->get('/skills');

    $response->assertStatus(200);
});
