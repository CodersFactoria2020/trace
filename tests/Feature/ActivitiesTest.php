<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;

class ActivitiesTest extends TestCase
{
    public function testSuccessResponseToUserAuthorized()
    {
        $response = $this->get('/activitats');
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/activitats');
        
        $response->assertStatus(200);
        $response->assertSeeText('Activitats');
    }

    public function testInfoToUserNotAuthorized()
    {
        $response = $this->get('/activitats');

        $response->assertStatus(302);
        $response->assertSeeText('login');
    }

}
