<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;

class UsersTest extends TestCase
{
    use RefreshDatabase;
    public function test_genuine_dashboard_page_displayed_to_authorized_user()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/usuaris');

        //$response->assertStatus(200);
        $response->assertSeeText('USUARIS REGISTRATS');
    }

    public function test_genuine_dashboard_page_displayed_to_authorized_associated()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->role_id['Soci']->get('/dashboard');

        //$response->assertStatus(200);
        $response->assertSeeText('El meu pla de treball');
    }

}
