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
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/usuaris');
        
        //$response->assertStatus(200);
        $response->assertSeeText("Gestió d'usuaris");
    }

    public function test_user_role_is_not_empty()
    {
        factory(User::class)->create(['first_name' => 'Maria', 'last_name' => 'Perez', 'email' => 'maria.perez@example.com', 'phone' => '+341425636', 'dni' => '87652A', 'role_id' => '1']);
        $userRole = empty($user->role_id);
        
        $expectedReturn = true;

        $this->assertEquals($userRole, $expectedReturn);
    }
    
    public function test_genuine_dashboard_page_displayed_to_authorized_associated()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->role_id['Soci']->get('/dashboard');
        
        //$response->assertStatus(200);
        $response->assertSeeText('El meu pla de treball');
    }
}