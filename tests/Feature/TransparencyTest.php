<?php

namespace Tests\Feature;

use App\Role;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransparencyTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_all_team()
    {
        $role = factory(Role::class)->create();
        $user = factory(User::class)->states('admin')->create();
        $response = $this->actingAs($user)->get('/team');

        $response->assertStatus(200);
    }
}
