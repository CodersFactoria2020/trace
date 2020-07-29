<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        factory(Permission::class)->create(['name'=>'Display users', 'slug'=>'user.index']);
        factory(Permission::class)->create(['name'=>'Create user', 'slug'=>'user.create']);
        factory(Permission::class)->create(['name'=>'Edit user', 'slug'=>'user.edit']);
        factory(Permission::class)->create(['name'=>'Show user', 'slug'=>'user.show']);
        factory(Permission::class)->create(['name'=>'Delete user', 'slug'=>'user.destroy']);
        
        factory(Permission::class)->create(['name'=>'Display roles', 'slug'=>'role.index']);
        factory(Permission::class)->create(['name'=>'Create role', 'slug'=>'role.create']);
        factory(Permission::class)->create(['name'=>'Edit role', 'slug'=>'role.edit']);
        factory(Permission::class)->create(['name'=>'Show role', 'slug'=>'role.show']);
        factory(Permission::class)->create(['name'=>'Delete role', 'slug'=>'role.destroy']);

        factory(Permission::class)->create(['name'=>'Display activities', 'slug'=>'activity.index']);
        factory(Permission::class)->create(['name'=>'Create activity', 'slug'=>'activity.create']);
        factory(Permission::class)->create(['name'=>'Edit activity', 'slug'=>'activity.edit']);      
        factory(Permission::class)->create(['name'=>'Show activity', 'slug'=>'activity.show']);
        factory(Permission::class)->create(['name'=>'Delete activity', 'slug'=>'activity.destroy']);

        factory(Permission::class)->create(['name'=>'Display categories', 'slug'=>'category.index']);
        factory(Permission::class)->create(['name'=>'Create category', 'slug'=>'category.create']);
        factory(Permission::class)->create(['name'=>'Edit category', 'slug'=>'category.edit']);      
        factory(Permission::class)->create(['name'=>'Show category', 'slug'=>'category.show']);
        factory(Permission::class)->create(['name'=>'Delete category', 'slug'=>'category.destroy']);

        factory(Permission::class)->create(['name'=>'Edit own user', 'slug'=>'user.ownedit']);
        factory(Permission::class)->create(['name'=>'Delete own user', 'slug'=>'user.owndestroy']);
    }
}
