<?php

namespace Tests\Feature;

use App\Models\Month;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FreeUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_free_user_gets_immediate_access()
    {
        $user = User::factory()->create(['free' => true]);
        $month = Month::factory()->create(['fee' => 1000]);

        $response = $this->actingAs($user)->post('/basket', [
            'month_id' => $month->id,
        ]);

        $response->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('payments', [
            'user_id' => $user->id,
            'month_id' => $month->id,
            'amount' => 0,
        ]);

        $payment = \App\Models\Payment::where('user_id', $user->id)->first();
        $this->assertNotNull($payment->purchased_at);
    }

    public function test_regular_user_goes_to_basket()
    {
        $user = User::factory()->create(['free' => false]);
        $month = Month::factory()->create(['fee' => 1000]);

        $response = $this->actingAs($user)->post('/basket', [
            'month_id' => $month->id,
        ]);

        $response->assertRedirect('/basket');

        $this->assertDatabaseHas('payments', [
            'user_id' => $user->id,
            'month_id' => $month->id,
            'amount' => 1000,
            'purchased_at' => null,
        ]);
    }
}
