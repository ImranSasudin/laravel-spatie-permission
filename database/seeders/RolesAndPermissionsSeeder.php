<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\Module;
use Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Module::create(['name' => 'Article']);
        Permission::create(['name' => 'create articles', 'module_id' => '1']);
        Permission::create(['name' => 'view articles', 'module_id' => '1']);
        Permission::create(['name' => 'edit articles', 'module_id' => '1']);
        Permission::create(['name' => 'delete articles', 'module_id' => '1']);
        Permission::create(['name' => 'publish articles', 'module_id' => '1']);
        Permission::create(['name' => 'unpublish articles', 'module_id' => '1']);

        Module::create(['name' => 'Post']);
        Permission::create(['name' => 'create posts', 'module_id' => '2']);
        Permission::create(['name' => 'view posts', 'module_id' => '2']);
        Permission::create(['name' => 'edit posts', 'module_id' => '2']);
        Permission::create(['name' => 'delete posts', 'module_id' => '2']);

        $role1 = Role::create(['name' => 'super-admin']);
        $user = \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('123'),
        ]);
        $user->assignRole($role1);

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('publish articles');
        $role2->givePermissionTo('unpublish articles');
        $role2->givePermissionTo('view articles');
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
        ]);
        $user->assignRole($role2);

        $role3 = Role::create(['name' => 'writer']);
        $role3->givePermissionTo('create articles');
        $role3->givePermissionTo('edit articles');
        $role3->givePermissionTo('delete articles');
        $role3->givePermissionTo('view articles');
        $user = \App\Models\User::factory()->create([
            'name' => 'Writer',
            'email' => 'writer@gmail.com',
            'password' => Hash::make('123'),
        ]);
        $user->assignRole($role3);

        $role4 = Role::create(['name' => 'user']);
        $role4->givePermissionTo('view articles');
        $user = \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123'),
        ]);
        $user->assignRole($role4);


    }
}
