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

    public function test_user_role_is_not_empty()
    {
        factory(User::class)->create(['first_name' => 'Maria', 'last_name' => 'Perez', 'email' => 'maria.perez@example.com', 'phone' => '+341425636', 'dni' => '87652A', 'role_id' => '3']);
        $userRole = empty($user->role_id);
        
        $expectedReturn = true;

        $this->assertEquals($userRole, $expectedReturn);
    }
}