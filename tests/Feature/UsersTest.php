<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
use App\Role;

class UsersTest extends TestCase
{
    use RefreshDatabase;
    public function test_genuine_dashboard_page_displayed_to_authorized_user()
    {
        $role = factory(Role::class)->create();
        $user = factory(User::class)->states('Admin')->create();
        $response = $this->actingAs($user)->get('/user');
        
        $response->assertStatus(200);
        $response->assertSee('Gesti');
    }

    public function test_user_role_is_not_empty()
    {
        $role = factory(Role::class)->create();
        $user = factory(User::class)->states('Admin')->create();
        $userRole = empty($user->role_id);
        
        $expectedReturn = false;

        $this->assertEquals($userRole, $expectedReturn);
    }
    
    // public function test_genuine_dashboard_page_displayed_to_authorized_associated()
    // {
    //     $role = factory(Role::class)->create();
    //     $user = factory(User::class)->states('admin')->create();
    //     $response = $this->actingAs($user)->role_id['Soci']->get('/dashboard');
        
    //     //$response->assertStatus(200);
    //     $response->assertSeeText('El meu pla de treball');
    // }
}