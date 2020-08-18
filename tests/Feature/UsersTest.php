<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
use App\Role;

class UsersTest extends TestCase
{
    use RefreshDatabase;
    
    // public function test_user_role_is_not_empty()
    // {
    //     $role = factory(Role::class)->create();
    //     $user = factory(User::class)->states('Admin')->create();
    //     $userRole = empty($user->role_id);
        
    //     $expectedReturn = false;

    //     $this->assertEquals($userRole, $expectedReturn);
    // }

    // public function test_genuine_dashboard_page_displayed_to_Admin_user()
    // {
    //     $role = factory(Role::class)->create();
    //     $user = factory(User::class)->states('Admin')->create();
    //     $response = $this->actingAs($user)->get('/dashboard');
        
    //     $response->assertStatus(200);
    //     $response->assertSee('Selecciona en el panell');
    // }

    public function test_genuine_dashboard_page_displayed_to_Soci_user()
    {
        $role = factory(Role::class)->create();
        $user = factory(User::class)->states('Soci')->create();
        $response = $this->actingAs($user)->get('/dashboard');
        
        $response->assertStatus(200);
        $response->assertSee('El meu pla de treball');
    }
    
}
