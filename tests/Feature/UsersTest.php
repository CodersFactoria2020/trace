<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
use App\Role;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    //*************************************************************************** Not logged in tests **************************************************************************

    public function test_if_user_not_logged_in_is_redirected_to_login_page_when_access_users_index()
    {
        $response = $this->get('/user');
        $response->assertRedirect('/login');
    }

    public function test_if_user_not_logged_in_is_redirected_to_login_page_when_access_users_show()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $response = $this->get('/user/1');
        $response->assertRedirect('/login');
    }

    public function test_if_user_not_logged_in_is_redirected_to_login_page_when_access_users_destroy()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $response = $this->delete('/user/1');
        $response->assertRedirect('/login');
    }

    public function test_if_user_not_logged_in_is_redirected_to_login_page_when_access_users_store()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $response = $this->post('/user', [
            'first_name'=>'Pep',
            'last_name'=>'Vilanova',
            'email' =>'pep.vilanova@example.com',
            'password' =>'password',
            'phone' =>'555666777',
            'dni'=>'45632178Q',
            'tutor' =>'Selma',
            'role_id' => '3'
        ]);
        $response->assertRedirect('/login');
    }

    public function test_if_user_not_logged_in_is_redirected_to_login_page_when_access_users_update()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $response = $this->patch('/user/1', [
            'first_name'=>'Pep',
            'last_name'=>'Vilanova',
            'email' =>'pep.vilanova@example.com',
            'password' =>'password',
            'phone' =>'555666777',
            'dni'=>'45632178Q',
            'tutor' =>'Selma',
            'role_id' => '3'
        ]);
        $response->assertRedirect('/login');
    }

    //*************************************************************************** Logged as Admin tests **************************************************************************
    public function test_user_role_is_not_empty()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $userRole = empty($user->role_id);

        $expectedReturn = false;

        $this->assertEquals($userRole, $expectedReturn);
    }

    public function test_genuine_dashboard_page_displayed_to_Admin_user()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Selecciona en el panell');
    }

    public function test_if_user_logged_in_as_admin_can_access_users_index()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $response = $this->actingAs($user)->get('/user');
        $response->assertStatus(200);
        $response->assertSee('Afegir');
    }

    public function test_if_user_logged_in_as_admin_can_access_users_show()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $userTwo = factory(User::class)->states('Admin')->create();
        $response = $this->actingAs($user)->get('/user/2');
        $response->assertStatus(200);
        $response->assertSee('Detalls');
    }

    public function test_Admin_can_add_a_new_user()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $response = $this->actingAs($user)->post('/user', [
            'first_name'=>'Pep',
            'last_name'=>'Vilanova',
            'email' =>'pep.vilanova@example.com',
            'password' =>'password',
            'phone' =>'555666777',
            'dni'=>'45632178Q',
            'tutor' =>'Selma',
            'role_id' => '3'
        ]);

        $this->assertDatabaseHas('users',[
            'first_name'=>'Pep',
            'last_name'=>'Vilanova',
            'email' =>'pep.vilanova@example.com',
            'phone' =>'555666777',
            'dni'=>'45632178Q',
            'tutor' =>'Selma',
            'role_id' => '3'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/user');
    }

    public function test_Admin_can_edit_users()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $userTwo = factory(User::class)->states('Admin')->create();
        $response = $this->actingAs($user)->patch('/user/2', [
            'first_name'=>'Pep',
            'last_name'=>'Vilanova',
            'email' =>'pep.vilanova@example.com',
            'password' =>'password',
            'phone' =>'555666777',
            'dni'=>'45632178Q',
            'tutor' =>'Selma',
            'role_id' => '3'
        ]);

        $this->assertDatabaseHas('users',[
            'first_name'=>'Pep',
            'last_name'=>'Vilanova',
            'email' =>'pep.vilanova@example.com',
            'phone' =>'555666777',
            'dni'=>'45632178Q',
            'tutor' =>'Selma',
            'role_id' => '3'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/user');
    }

    public function test_Admin_can_delete_users()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $userTwo = factory(User::class)->states('Admin')->create();
        $response = $this->actingAs($user)->delete('/user/2');
        $this->assertDatabaseMissing('users',[
            'first_name'=>$userTwo->first_name,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/user');
    }


    //*************************************************************************** Profesional tests **************************************************************************
    public function test_professional_user_role_is_not_empty()
    {
        $role = factory(Role::class)->states('Professional')->create();
        $user = factory(User::class)->states('Professional')->create();
        $userRole = empty($user->role_id);

        $expectedReturn = false;

        $this->assertEquals($userRole, $expectedReturn);
    }

    public function test_genuine_dashboard_page_displayed_to_professional_user()
    {
        $role = factory(Role::class)->states('Professional')->create();
        $user = factory(User::class)->states('Professional')->create();
        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Selecciona en el panell');
    }

    public function test_if_user_logged_in_as_professional_can_access_users_index()
    {
        $role = factory(Role::class)->states('Professional')->create();
        $user = factory(User::class)->states('Professional')->create();
        $response = $this->actingAs($user)->get('/user');
        $response->assertStatus(200);
    }

    public function test_if_user_logged_in_as_professional_can_access_users_show()
    {
        $role = factory(Role::class)->states('Professional')->create();
        $user = factory(User::class)->states('Professional')->create();
        $userTwo = factory(User::class)->states('Professional')->create();
        $response = $this->actingAs($user)->get('/user/2');
        $response->assertStatus(200);
        $response->assertSee('Detalls');
    }

    public function test_if_user_logged_in_as_professional_cant_create_users_show()
    {
        $role = factory(Role::class)->states('Professional')->create();
        $user = factory(User::class)->states('Professional')->create();
        $response = $this->actingAs($user)->post('/user', [
            'first_name'=>'Pep',
            'last_name'=>'Vilanova',
            'email' =>'pep.vilanova@example.com',
            'password' =>'password',
            'phone' =>'555666777',
            'dni'=>'45632178Q',
            'tutor' =>'Selma',
            'role_id' => '1'
        ]);

        $this->assertDatabaseMissing('users',[
            'first_name'=>'Pep',
            'last_name'=>'Vilanova',
            'email' =>'pep.vilanova@example.com',
            'phone' =>'555666777',
            'dni'=>'45632178Q',
            'tutor' =>'Selma',
            'role_id' => '1'
        ]);

        $response->assertStatus(403);
    }

    public function test_if_user_logged_as_professional_cant_edit_users()
    {
        $role = factory(Role::class)->states('Professional')->create();
        $user = factory(User::class)->states('Professional')->create();
        $userTwo = factory(User::class)->states('Professional')->create();
        $response = $this->actingAs($user)->patch('/user/2', [
            'first_name'=>'Pep',
            'last_name'=>'Vilanova',
            'email' =>'pep.vilanova@example.com',
            'password' =>'password',
            'phone' =>'555666777',
            'dni'=>'45632178Q',
            'tutor' =>'Selma',
            'role_id' => '3'
        ]);

        $this->assertDatabaseHas('users',[
            'first_name'=>$userTwo->first_name,
            'last_name'=>$userTwo->last_name,
            'email' =>$userTwo->email,
            'phone' =>$userTwo->phone,
            'dni'=>$userTwo->dni,
        ]);

        $this->assertDatabaseMissing('users',[
            'first_name'=>'Pep',
            'last_name'=>'Vilanova',
            'email' =>'pep.vilanova@example.com',
            'phone' =>'555666777',
            'dni'=>'45632178Q',
            'tutor' =>'Selma',
            'role_id' => '3'
        ]);

        $response->assertStatus(403);
    }

    public function test_if_user_logged_as_professional_cant_delete_users()
    {
        $role = factory(Role::class)->states('Professional')->create();
        $user = factory(User::class)->states('Professional')->create();
        $userTwo = factory(User::class)->states('Professional')->create();
        $response = $this->actingAs($user)->delete('/user/2');
        $this->assertDatabaseHas('users',[
            'first_name'=>$userTwo->first_name,
            'last_name'=>$userTwo->last_name,
            'email' =>$userTwo->email,
            'phone' =>$userTwo->phone,
            'dni'=>$userTwo->dni,
        ]);

        $response->assertStatus(403);
    }

    //*************************************************************************** Soci tests **************************************************************************
    public function test_genuine_dashboard_page_displayed_to_soci_user()
    {
        $role = factory(Role::class)->states('Soci')->create();
        $user = factory(User::class)->states('Soci')->create();
        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
        $response->assertSee('ACTIVITATS D');
    }

    public function test_if_user_logged_in_as_soci_cant_access_users_index()
    {
        $role = factory(Role::class)->states('Soci')->create();
        $user = factory(User::class)->states('Soci')->create();
        $response = $this->actingAs($user)->get('/user');
        $response->assertStatus(403);
    }

    public function test_if_user_logged_in_as_soci_cant_access_users_show_to_other_socis()
    {
        $role = factory(Role::class)->states('Soci')->create();
        $user = factory(User::class)->states('Soci')->create();
        $userTwo = factory(User::class)->states('Soci')->create();
        $response = $this->actingAs($user)->get("/user/$userTwo->id");
        $response->assertStatus(403);
    }

    public function test_if_user_logged_in_as_soci_cant_create_users_show()
    {
        $role = factory(Role::class)->states('Soci')->create();
        $user = factory(User::class)->states('Soci')->create();
        $response = $this->actingAs($user)->post('/user', [
            'first_name'=>'Pep',
            'last_name'=>'Vilanova',
            'email' =>'pep.vilanova@example.com',
            'password' =>'password',
            'phone' =>'555666777',
            'dni'=>'45632178Q',
            'tutor' =>'Selma',
            'role_id' => '1'
        ]);

        $this->assertDatabaseMissing('users',[
            'first_name'=>'Pep',
            'last_name'=>'Vilanova',
            'email' =>'pep.vilanova@example.com',
            'phone' =>'555666777',
            'dni'=>'45632178Q',
            'tutor' =>'Selma',
            'role_id' => '1'
        ]);

        $response->assertStatus(403);
    }

    public function test_if_user_logged_as_soci_cant_edit_users()
    {
        $role = factory(Role::class)->states('Soci')->create();
        $user = factory(User::class)->states('Soci')->create();
        $userTwo = factory(User::class)->states('Soci')->create();
        $response = $this->actingAs($user)->patch('/user/2', [
            'first_name'=>'Pep',
            'last_name'=>'Vilanova',
            'email' =>'pep.vilanova@example.com',
            'password' =>'password',
            'phone' =>'555666777',
            'dni'=>'45632178Q',
            'tutor' =>'Selma',
            'role_id' => '3'
        ]);

        $this->assertDatabaseHas('users',[
            'first_name'=>$userTwo->first_name,
            'last_name'=>$userTwo->last_name,
            'email' =>$userTwo->email,
            'phone' =>$userTwo->phone,
            'dni'=>$userTwo->dni,
        ]);

        $this->assertDatabaseMissing('users',[
            'first_name'=>'Pep',
            'last_name'=>'Vilanova',
            'email' =>'pep.vilanova@example.com',
            'phone' =>'555666777',
            'dni'=>'45632178Q',
            'tutor' =>'Selma',
            'role_id' => '3'
        ]);

        $response->assertStatus(403);
    }

    public function test_if_user_logged_as_soci_cant_delete_users()
    {
        $role = factory(Role::class)->states('Soci')->create();
        $user = factory(User::class)->states('Soci')->create();
        $userTwo = factory(User::class)->states('Soci')->create();
        $response = $this->actingAs($user)->delete('/user/2');
        $this->assertDatabaseHas('users',[
            'first_name'=>$userTwo->first_name,
            'last_name'=>$userTwo->last_name,
            'email' =>$userTwo->email,
            'phone' =>$userTwo->phone,
            'dni'=>$userTwo->dni,
        ]);

        $response->assertStatus(403);
    }
}
