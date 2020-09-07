<?php

namespace Tests\Feature;

use App\Category;
use App\User;
use App\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_not_logged_in_cannot_access_to_areas()
    {
        $response = $this->get('/areas');
        $response->assertStatus(302);
    }

    public function test_admin_can_view_all_categories()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();

        $response = $this->actingAs($user)->get('/areas');

        $response->assertStatus(200);
    }

    public function test_admin_can_view_one_category()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $category = factory(Category::class)->create();

        $response = $this->get('/category/' . $category->id);

        $response->assertStatus(302);
    }

    public function test_admin_can_create_category()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $response = $this->actingAs($user)->post('/category', [
            'id' => 1,
            'name' => 'Neurology'
        ]);

        $this->assertDatabaseHas('categories', [
            'id' => 1,
            'name' => 'Neurology'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/areas');
    }

    public function test_admin_can_update_category()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $category = factory(Category::class)->create();

        $response = $this->actingAs($user)->patch('/category/' . $category->id);

        $this->assertDatabaseHas('categories', [
            'id' => $category->id
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/areas');
    }

    public function test_admin_can_delete_category()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $category = factory(Category::class)->create();

        $this->assertDatabaseHas('categories', ['id' => $category->id]);

        $response = $this->actingAs($user)->delete('category/' . $category->id);

        $this->assertDatabaseMissing('categories', [
            'id' => $category->id,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/areas');
    }

    public function test_professional_can_view_all_categories()
    {
        $role = factory(Role::class)->states('Professional')->create();
        $user = factory(User::class)->states('Professional')->create();

        $response = $this->actingAs($user)->get('/areas');
        $response->assertStatus(200);
    }

    public function test_professional_can_view_one_category()
    {
        $role = factory(Role::class)->states('Professional')->create();
        $user = factory(User::class)->states('Professional')->create();
        $category = factory(Category::class)->create();

        $response = $this->get('/category/' . $category->id);
        $response->assertStatus(302);
    }

    public function test_professional_cannot_create_category()
    {
        $role = factory(Role::class)->states('Professional')->create();
        $user = factory(User::class)->states('Professional')->create();
        $response = $this->actingAs($user)->post('/category', [
            'id' => 1,
            'name' => 'Neurology'
        ]);

        $response->assertStatus(403);
    }

    public function test_professional_cannot_update_category()
    {
        $role = factory(Role::class)->states('Professional')->create();
        $user = factory(User::class)->states('Professional')->create();
        $category = factory(Category::class)->create();
        $response = $this->actingAs($user)->patch('/category/' . $category->id);

        $this->assertDatabaseHas('categories', [
            'id' => $category->id
        ]);

        $response->assertStatus(403);
    }

    public function test_professional_cannot_delete_category()
    {
        $admin_role = factory(Role::class)->states('Admin')->create();
        $admin_user = factory(User::class)->states('Admin')->create();
        $professional_role = factory(Role::class)->states('Professional')->create();
        $professional_user = factory(User::class)->states('Professional')->create();
        $category = factory(Category::class)->create();

        $this->assertDatabaseHas('categories', [
            'id' => $category->id
        ]);

        $response = $this->actingAs($professional_user)->delete('category/' . $category->id);

        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
        ]);

        $response->assertStatus(403);
    }

    public function test_soci_cannot_view_all_categories()
    {
        $role = factory(Role::class)->states('Soci')->create();
        $user = factory(User::class)->states('Soci')->create();
        $response = $this->actingAs($user)->get('/areas');

        $response->assertStatus(403);
    }

    public function test_soci_can_view_one_category()
    {
        $role = factory(Role::class)->states('Soci')->create();
        $user = factory(User::class)->states('Soci')->create();
        $category = factory(Category::class)->create();
        $response = $this->get('/category/' . $category->id);

        $response->assertStatus(302);
    }

    public function test_soci_cannot_create_category()
    {
        $role = factory(Role::class)->states('Soci')->create();
        $user = factory(User::class)->states('Soci')->create();
        $response = $this->actingAs($user)->post('/category', [
            'id' => 1,
            'name' => 'Neurology'
        ]);

        $response->assertStatus(403);
    }

    public function test_soci_cannot_update_category()
    {
        $role = factory(Role::class)->states('Soci')->create();
        $user = factory(User::class)->states('Soci')->create();
        $category = factory(Category::class)->create();
        $response = $this->actingAs($user)->patch('/category/' . $category->id);

        $this->assertDatabaseHas('categories', [
            'id' => $category->id
        ]);

        $response->assertStatus(403);
    }

    public function test_soci_cannot_delete_category()
    {
        $admin_role = factory(Role::class)->states('Admin')->create();
        $admin_user = factory(User::class)->states('Admin')->create();
        $soci_role = factory(Role::class)->states('Soci')->create();
        $soci_user = factory(User::class)->states('Soci')->create();
        $category = factory(Category::class)->create();

        $this->assertDatabaseHas('categories', [
            'id' => $category->id
        ]);

        $response = $this->actingAs($soci_user)->delete('category/' . $category->id);

        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
        ]);

        $response->assertStatus(403);
    }
}
