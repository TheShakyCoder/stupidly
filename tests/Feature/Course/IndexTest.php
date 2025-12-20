<?php

test('anyone can view the list of courses', function () {
    $response = $this->get('/courses');

    $response->assertStatus(200);
});
