<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'add personal information']);
        Permission::create(['name' => 'edit personal information']);
        Permission::create(['name' => 'delete personal information']);
        Permission::create(['name' => 'add advertisement']);
        Permission::create(['name' => 'edit advertisement']);
        Permission::create(['name' => 'delete advertisement']);
        Permission::create(['name' => 'publish advertisement']);
        Permission::create(['name' => 'unpublish advertisement']);
        Permission::create(['name' => 'add category']);
        Permission::create(['name' => 'edit category']);
        Permission::create(['name' => 'delete category']);
        Permission::create(['name' => 'add city']);
        Permission::create(['name' => 'edit city']);
        Permission::create(['name' => 'delete city']);
        Permission::create(['name' => 'add region']);
        Permission::create(['name' => 'edit region']);
        Permission::create(['name' => 'delete region']);

        $user = Role::create(['name' => 'user']);
        $user->givePermissionTo('add personal information');
        $user->givePermissionTo('edit personal information');
        $user->givePermissionTo('delete personal information');
        $user->givePermissionTo('add advertisement');
        $user->givePermissionTo('edit advertisement');
        $user->givePermissionTo('delete advertisement');
        $user->givePermissionTo();

        $moderator = Role::create(['name' => 'moderator']);
        $moderator->givePermissionTo('publish advertisement');
        $moderator->givePermissionTo('unpublish advertisement');
        $moderator->givePermissionTo('delete advertisement');
    }
}
