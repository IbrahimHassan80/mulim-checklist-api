<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Admin;
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

        // create permissions
        Permission::create(['guard_name' => 'admin','name' => 'add admins']);
        Permission::create(['guard_name' => 'admin','name' => 'edit admins']);
        Permission::create(['guard_name' => 'admin','name' => 'delete admins']);

        // create roles and assign existing permissions
        $role1 = Role::create(['guard_name' => 'admin','name' => 'Super admin']);
        $role1->givePermissionTo('add admins');
        $role1->givePermissionTo('edit admins');
        $role1->givePermissionTo('delete admins');
        
        $role2 = Role::create(['guard_name' => 'admin','name' => 'admin']);
        $role2->givePermissionTo('add admins');

        $admin = Admin::find(1);
        $admin->assignRole($role1);
        
    }
}
