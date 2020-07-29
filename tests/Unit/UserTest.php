<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\User;
use App\Role;

class UserUnitTest extends TestCase
{
    use RefreshDatabase;

    public function test_userRole_returns_empty_array_for_user_without_role()
    {
        $user = factory(User::class)->create();
        $userRoles = $user->actualRoles();
        
        $expectedReturn = [];

        $this->assertEquals($userRoles, $expectedReturn);
    }

    public function test_userRole_returns_an_array_for_user_with_1_role()
    {

        $adminRole = factory(Role::class)->create(['id'=>'1','name'=>'admin', 'description'=>'Administrador del sitio']);
        $adminRoleId = $adminRole->id;

        $user = factory(User::class)->create();
        $user->roles()->sync([$adminRoleId]);

        $userRoles = $user->actualRoles();
        
        $expectedReturn = ['admin'];

        $this->assertEquals($userRoles, $expectedReturn);
    }

    public function test_userRole_returns_an_array_for_user_with_many_roles()
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

}

?>