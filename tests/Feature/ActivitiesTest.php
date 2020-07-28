<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;

class ActivitiesTest extends TestCase
{
    use RefreshDatabase;
    public function test_success_response_to_user_authorized()
    {

        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/activitats');

        $response->assertStatus(200);
        $response->assertSeeText('Activitats');
    }

   public function test_info_to_user_not_authorized()
    {
        $response = $this->get('/activitats');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
