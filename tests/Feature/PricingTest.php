<?php

test('show the pricing page', function () {
    $response = $this->get('/pricing');

    $response->assertStatus(200);
});
