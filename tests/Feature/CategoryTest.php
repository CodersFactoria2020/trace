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

    public function test_admin_can_see_categories()
    {
        $role = factory(Role::class)->create();
        $user = factory(User::class)->states('admin')->create();
        $response = $this->actingAs($user)->get('/areas');

        $response->assertStatus(200);
    }

    public function test_admin_can_create_category()
    {
        $role = factory(Role::class)->create();
        $user = factory(User::class)->states('admin')->create();
        $response = $this->actingAs($user)->post('/category', [
            'id' => 1,
            'category_name' => 'Neurology',
            'description' => 'Is a branch of medicine dealing with disorders of the nervous system',
            'category_color' => '#ff0000',
        ]);

        $this->assertDatabaseHas('categories', [
            'id' => 1,
            'category_name' => 'Neurology',
            'description' => 'Is a branch of medicine dealing with disorders of the nervous system',
            'category_color' => '#ff0000',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/areas');
    }

    public function test_admin_can_delete_category()
    {
        $role = factory(Role::class)->create();
        $user = factory(User::class)->states('admin')->create();
        $category = factory(Category::class)->create([
            'id' => 1,
            'category_name' => 'Neurology',
            'description' => 'Is a branch of medicine dealing with disorders of the nervous system',
            'category_color' => '#ff0000',
        ]);

        $this->assertDatabaseHas('categories', [
            'id' => 1,
            'category_name' => 'Neurology',
            'description' => 'Is a branch of medicine dealing with disorders of the nervous system',
            'category_color' => '#ff0000',
        ]);

        $response = $this->actingAs($user)->delete('category/'. $category->id);

        $this->assertDatabaseMissing('categories', [
            'id' => 1,
            'category_name' => 'Neurology',
            'description' => 'Is a branch of medicine dealing with disorders of the nervous system',
            'category_color' => '#ff0000',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/areas');
    }

    public function test_admin_can_update_category()
    {
        $role = factory(Role::class)->create();
        $user = factory(User::class)->states('admin')->create();
        $category = factory(Category::class)->create([
            'id' => 1,
            'category_name' => 'Neurology',
            'description' => 'Is a branch of medicine dealing with disorders of the nervous system',
            'category_color' => '#ff0000',
        ]);

        $response = $this->actingAs($user)->patch('/category/' . $category->id, [
            'id' => 1,
            'category_name' => 'Psychology',
            'description' => 'Is the science of mind and behavior',
            'category_color' => '#ff1122',
        ]);

        $this->assertDatabaseHas('categories', [
            'id' => 1,
            'category_name' => 'Psychology',
            'description' => 'Is the science of mind and behavior',
            'category_color' => '#ff1122',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/areas');
    }

}
