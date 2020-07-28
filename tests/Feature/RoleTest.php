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


}
