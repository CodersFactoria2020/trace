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
        $response = $this->actingAs($user)->get('/activity');

        $response->assertStatus(200);
        $response->assertSeeText('Activitats');
    }

    public function test_redirect_user_not_authorized()
    {
        $response = $this->get('/activity');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
    public function test_activity_is_created()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->post('/activity', ['name'=>'Natació', 'description'=>'descipció', 'professional'=>'Paca', 'date'=>'2020-01-02', 'time'=>'13:00']);
        $this->assertDatabaseHas('activities', ['name'=>'Natació', 'description'=>'descipció', 'professional'=>'Paca', 'date'=>'2020-01-02', 'time'=>'13:00']);
        $response->assertStatus(302);
        $response->assertRedirect('/activity');
    }

   /*public function test_can_upload_file()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)
    }*/

}
