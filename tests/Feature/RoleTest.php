<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\User;
use App\Role;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_user_has_admin_role()
    {
        $adminRole = factory(Role::class)->create(['id'=>'1','name'=>'admin', 'description'=>'Administrador del sitio']);
        $adminRoleId = $adminRole->id;

        $user = factory(User::class)->create();
        $user->roles()->sync([$adminRoleId]);

        $userRole=$user->actualRoles();
        $expected = ['admin'];
        
        $this->assertNotNull($userRole);
        $this->assertEquals($userRole, $expected);
    }

    public function test_if_user_has_professional_role()
    {
        $professionalRole = factory(Role::class)->create(['id'=>'2','name'=>'professional', 'description'=>'Administrador del sitio']);
        $professionalRoleId = $professionalRole->id;

        $user = factory(User::class)->create();
        $user->roles()->sync([$professionalRoleId]);

        $userRole=$user->actualRoles();
        $expected = ['professional'];
        
        $this->assertNotNull($userRole);
        $this->assertEquals($userRole, $expected);
    }

    public function test_if_user_has_associated_role()
    {
        $associatedRole = factory(Role::class)->create(['id'=>'3','name'=>'associated', 'description'=>'Administrador del sitio']);
        $associatedRoleId = $associatedRole->id;

        $user = factory(User::class)->create();
        $user->roles()->sync([$associatedRoleId]);


        $userRole=$user->actualRoles();
        $expected = ['associated'];
        
        $this->assertNotNull($userRole);
        $this->assertEquals($userRole, $expected);
    }

    public function test_if_user_has_associated_many_roles()
    {
        $adminRole = factory(Role::class)->create(['id'=>'1','name'=>'admin', 'description'=>'Administrador del sitio']);
        $professionalRole = factory(Role::class)->create(['id'=>'2','name'=>'professional', 'description'=>'Profesional del sitio']);
        $adminRoleId = $adminRole->id;
        $professionalRoleId = $professionalRole->id;

        $user = factory(User::class)->create();
        $user->roles()->sync([$adminRoleId, $professionalRoleId]);

        $userRoles = $user->actualRoles();

        $expectedReturn = ['admin', 'professional'];

        $this->assertEquals($userRoles, $expectedReturn);
    }

    public function test_if_unauthorized_user_cant_access_roles_index_and_gets_redirected_to_login()
    {
        $response = $this->get('/role');
        $response->assertRedirect('/login');
    }

    public function test_if_unauthorized_user_cant_access_roles_create_and_gets_redirected_to_login()
    {
        $response = $this->get('/role/create');
        $response->assertRedirect('/login');
    }

    public function test_if_unauthorized_user_cant_access_roles_edit_and_gets_redirected_to_login()
    {
        $response = $this->get('/role/2/edit');
        $response->assertRedirect('/login');
    }

    public function test_if_unauthorized_user_cant_access_roles_show_and_gets_redirected_to_login()
    {
        $response = $this->get('/role/2');
        $response->assertRedirect('/login');
        //$response->assertStatus(403);
    }

    public function test_if_associated_cant_access_role_index()
    {
        $this->artisan('db:seed');
        $user = User::where('id', 20)->first();
        $response = $this->actingAs($user)->get('/role');
        $response->assertStatus(403);
    }

    public function test_if_associated_cant_access_role_show()
    {
        $this->artisan('db:seed');
        $user = User::where('id', 20)->first();
        $response = $this->actingAs($user)->get('/role/2');
        $response->assertStatus(403);
    }

    public function test_if_associated_cant_access_role_edit()
    {
        $this->artisan('db:seed');
        $user = User::where('id', 20)->first();
        $response = $this->actingAs($user)->get('/role/2/edit');
        $response->assertStatus(403);
    }

    public function test_if_associated_cant_access_role_create()
    {
        $this->artisan('db:seed');
        $user = User::where('id', 20)->first();
        $response = $this->actingAs($user)->get('/role/create');
        $response->assertStatus(403);
    }

    public function test_if_professional_cant_access_role_index()
    {
        $this->artisan('db:seed');
        $user = User::where('id', 5)->first();
        $response = $this->actingAs($user)->get('/role');
        $response->assertStatus(403);
    }

    public function test_if_professional_cant_access_role_show()
    {
        $this->artisan('db:seed');
        $user = User::where('id', 5)->first();
        $response = $this->actingAs($user)->get('/role/2');
        $response->assertStatus(403);
    }

    public function test_if_professional_cant_access_role_edit()
    {
        $this->artisan('db:seed');
        $user = User::where('id', 5)->first();
        $response = $this->actingAs($user)->get('/role/2/edit');
        $response->assertStatus(403);
    }

    public function test_if_professional_cant_access_role_create()
    {
        $this->artisan('db:seed');
        $user = User::where('id', 5)->first();
        $response = $this->actingAs($user)->get('/role/create');
        $response->assertStatus(403);
    }
    
    public function test_if_admin_can_access_role_index()
    {
        $this->artisan('db:seed');
        $user = User::where('id', 1)->first();
        $response = $this->actingAs($user)->get('/role');
        $response->assertStatus(200);
        $response->assertSee('Add New');
        $response->assertSee('Modify');
        $response->assertSee('See');
        $response->assertSee('Delete');
        $response->assertSee('Name');
        $response->assertSee('Description');
    }

    public function test_if_admin_can_access_role_show()
    {
        $this->artisan('db:seed');
        $user = User::where('id', 1)->first();
        $response = $this->actingAs($user)->get('/role/2');
        $response->assertStatus(200);
        $response->assertSee('Name');
        $response->assertSee('Description');
    }

    public function test_if_admin_can_access_role_edit()
    {
        $this->artisan('db:seed');
        $user = User::where('id', 1)->first();
        $response = $this->actingAs($user)->get('/role/2/edit');
        $response->assertStatus(200);
        $response->assertSee('Name');
        $response->assertSee('Description');
        $response->assertSee('Edit');
    }

    public function test_if_admin_can_access_role_create()
    {
        $this->artisan('db:seed');
        $user = User::where('id', 1)->first();
        $response = $this->actingAs($user)->get('/role/create');
        $response->assertStatus(200);
        $response->assertSee('Name');
        $response->assertSee('Description');
        $response->assertSee('Add');
    }

    public function test_if_admin_can_create_a_role()
    {
        $this->artisan('db:seed');
        $user = User::where('id', 1)->first();
        $response = $this->actingAs($user)->get('/role/create');
        $response->assertStatus(200);
        $response->assertSee('Name');
        $response->assertSee('Description');
        $response->assertSee('Add');
    }
}
