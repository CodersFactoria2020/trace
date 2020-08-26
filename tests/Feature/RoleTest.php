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
        $user = new User();
        $admin = $user->createTestingUsers('admin');
        
        $userRole=$admin->actualRoles();

        $expected = ['admin'];
        
        $this->assertNotNull($userRole);
        $this->assertEquals($userRole, $expected);
    }

    public function test_if_user_has_professional_role()
    {
        $user = new User();
        $admin = $user->createTestingUsers('professional');
        
        $userRole=$admin->actualRoles();

        $expected = ['professional'];
        
        $this->assertNotNull($userRole);
        $this->assertEquals($userRole, $expected);
    }

    public function test_if_user_has_associated_role()
    {
        $user = new User();
        $admin = $user->createTestingUsers('associated');
        
        $userRole=$admin->actualRoles();

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
    }

    public function test_if_associated_cant_access_role_index()
    {
        $user = new User();
        $associated = $user->createTestingUsers('associated');
        
        $response = $this->actingAs($associated)->get('/role');
        $response->assertStatus(403);
    }

    public function test_if_associated_cant_access_role_show()
    {
        $user = new User();
        $associated = $user->createTestingUsers('associated');
        
        $response = $this->actingAs($associated)->get('/role/2');
        $response->assertStatus(403);
    }

    public function test_if_associated_cant_access_role_edit()
    {
        $user = new User();
        $associated = $user->createTestingUsers('associated');
        
        $response = $this->actingAs($associated)->get('/role/2/edit');
        $response->assertStatus(403);
    }

    public function test_if_associated_cant_access_role_create()
    {
        $user = new User();
        $associated = $user->createTestingUsers('associated');
        
        $response = $this->actingAs($associated)->get('/role/create');
        $response->assertStatus(403);
    }

    public function test_if_professional_cant_access_role_index()
    {
        $user = new User();
        $associated = $user->createTestingUsers('professional');
        
        $response = $this->actingAs($associated)->get('/role');
        $response->assertStatus(403);
    }

    public function test_if_professional_cant_access_role_show()
    {
        $user = new User();
        $professional = $user->createTestingUsers('professional');
        
        $response = $this->actingAs($professional)->get('/role/2');
        $response->assertStatus(403);
    }

    public function test_if_professional_cant_access_role_edit()
    {
        $user = new User();
        $professional = $user->createTestingUsers('professional');
        
        $response = $this->actingAs($professional)->get('/role/2/edit');
        $response->assertStatus(403);
    }

    public function test_if_professional_cant_access_role_create()
    {
        $user = new User();
        $professional = $user->createTestingUsers('professional');
        
        $response = $this->actingAs($professional)->get('/role/create');
        $response->assertStatus(403);
    }
    
    public function test_if_admin_can_access_role_index()
    {
        $user = new User();
        $admin = $user->createTestingUsers('admin');
        
        $response = $this->actingAs($admin)->get('/role');

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
        $user = new User();
        $admin = $user->createTestingUsers('admin');
        
        $response = $this->actingAs($admin)->get('/role/2');

        $response->assertStatus(200);
        $response->assertSee('Name');
        $response->assertSee('Description');
    }

    public function test_if_admin_can_access_role_edit()
    {
        $user = new User();
        $admin = $user->createTestingUsers('admin');
        
        $response = $this->actingAs($admin)->get('/role/2/edit');

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
        $user = new User();
        $admin = $user->createTestingUsers('admin');

        $response = $this->actingAs($admin)->post('/role', [
                'name'=>'Guest', 
                'description'=>'invitado'
            ]);
            
        $this->assertDatabaseHas('roles', ['name'=>'Guest', 'description'=>'invitado']);
        $response->assertStatus(302);
        $response->assertRedirect('/role');
    }

    public function test_if_admin_can_delete_a_role()
    {
        $user = new User();
        $admin = $user->createTestingUsers('admin');

        $role=factory(Role::class)->create(['id'=>'4','name'=>'Guest', 'description'=>'invitado']);
        $response = $this->actingAs($admin)->delete('/role/'.$role->id);

        $this->assertDatabaseMissing('roles', ['name'=>'Guest', 'description'=>'invitado']);
        $response->assertStatus(302);
    }

    public function test_if_admin_cant_delete_ts_own_role()
    {
        $user = new User();
        $admin = $user->createTestingUsers('admin');

        $roleAdminId=1;

        $response = $this->actingAs($admin)->delete('/role/'.$roleAdminId);

        $this->assertDatabaseHas('roles', ['name'=>'admin', 'description'=>'Administrador del sitio']);
        $response->assertStatus(200);
    }

    public function test_if_admin_can_edit_a_role()
    {
        $user = new User();
        $admin = $user->createTestingUsers('admin');

        $role=factory(Role::class)->create(['id'=>'4','name'=>'Guest', 'description'=>'invitado']);
        $updatedRole=['name'=>'Guest', 'description'=>'Otro'];

        $response = $this->actingAs($admin)->patch('/role/'.$role->id, $updatedRole);

        $this->assertDatabaseHas('roles', ['name'=>'Guest', 'description'=>'Otro']);
        $response->assertStatus(302);
    }

    //FALTA REFACTORIZAR ESTE TEST Y SU FUNCIONALIDAD
    public function test_if_admin_cant_edit_its_own_role()
    {
        $user = new User();
        $admin = $user->createTestingUsers('admin');

        $adminRoleId=1;
        $updatedRole=['name'=>'Guest', 'description'=>'Otro'];

        $response = $this->actingAs($admin)->patch('/role/'.$adminRoleId, $updatedRole);

        $this->assertDatabaseMissing('roles', ['name'=>'Guest', 'description'=>'Otro']);
        $response->assertStatus(200);
    }

    public function test_if_associated_cant_create_a_role()
    {
        $user = new User();
        $admin = $user->createTestingUsers('associated');

        $response = $this->actingAs($admin)->post('/role', [
                'name'=>'Guest', 
                'description'=>'invitado'
            ]);
            
        $this->assertDatabaseMissing('roles', ['name'=>'Guest', 'description'=>'invitado']);
        $response->assertStatus(403);
    }

    public function test_if_associated_cant_delete_a_role()
    {
        $user = new User();
        $admin = $user->createTestingUsers('associated');

        $role=factory(Role::class)->create(['id'=>'4','name'=>'Guest', 'description'=>'invitado']);
        $response = $this->actingAs($admin)->delete('/role/'.$role->id);

        $this->assertDatabaseHas('roles', ['name'=>'Guest', 'description'=>'invitado']);
        $response->assertStatus(403);
    }

    public function test_if_associated_cant_edit_a_role()
    {
        $user = new User();
        $admin = $user->createTestingUsers('associated');

        $role=factory(Role::class)->create(['id'=>'4','name'=>'Guest', 'description'=>'invitado']);
        $updatedRole=['name'=>'Guest', 'description'=>'Invitad@'];

        $response = $this->actingAs($admin)->patch('/role/'.$role->id, $updatedRole);

        $this->assertDatabaseMissing('roles', ['name'=>'Guest', 'description'=>'Invitad@']);
        $this->assertDatabaseHas('roles', ['name'=>'Guest', 'description'=>'invitado']);
        $response->assertStatus(403);
    }
    public function test_if_professional_cant_create_a_role()
    {
        $user = new User();
        $admin = $user->createTestingUsers('professional');

        $response = $this->actingAs($admin)->post('/role', [
                'name'=>'Guest', 
                'description'=>'invitado'
            ]);
            
        $this->assertDatabaseMissing('roles', ['name'=>'Guest', 'description'=>'invitado']);
        $response->assertStatus(403);
    }

    public function test_if_professional_cant_delete_a_role()
    {
        $user = new User();
        $admin = $user->createTestingUsers('professional');

        $role=factory(Role::class)->create(['id'=>'4','name'=>'Guest', 'description'=>'invitado']);
        $response = $this->actingAs($admin)->delete('/role/'.$role->id);

        $this->assertDatabaseHas('roles', ['name'=>'Guest', 'description'=>'invitado']);
        $response->assertStatus(403);
    }

    public function test_if_professional_cant_edit_a_role()
    {
        $user = new User();
        $admin = $user->createTestingUsers('professional');

        $role=factory(Role::class)->create(['id'=>'4','name'=>'Guest', 'description'=>'invitado']);
        $updatedRole=['name'=>'Guest', 'description'=>'Invitad@'];

        $response = $this->actingAs($admin)->patch('/role/'.$role->id, $updatedRole);

        $this->assertDatabaseMissing('roles', ['name'=>'Guest', 'description'=>'Invitad@']);
        $this->assertDatabaseHas('roles', ['name'=>'Guest', 'description'=>'invitado']);
        $response->assertStatus(403);
    }
}
