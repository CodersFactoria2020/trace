<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;

class userTest extends TestCase
{
    use RefreshDatabase;
    public function test_genuine_index_page_displayed_to_authorized_user()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/usuaris');
        
        $response->assertStatus(200);
        $response->assertSeeText('USUARIS REGISTRATS');
    }
}