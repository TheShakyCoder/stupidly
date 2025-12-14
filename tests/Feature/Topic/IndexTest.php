<?php

test('a collection of topics can be fetched', function () {
    $response = $this->get('/topics');

    $response->assertStatus(200);
    $response->assertJsonStructure([
        'data' => [
            '*' => [
                'id',
                'name',
            ],
        ],
    ]);
});
