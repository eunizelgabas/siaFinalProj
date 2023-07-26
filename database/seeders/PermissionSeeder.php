<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create(['name' => 'admin']);
        $role_standard = Role::create(['name' => 'normal']);
        $role_editor = Role::create(['name' => 'editor']);


        $permission_edit = Permission::create(['name' => 'edit-expense']);
        $permission_create = Permission::create(['name' => 'create-expense']);
        $permission_delete = Permission::create(['name' => 'delete-expense']);

        $employee_show = Permission::create(['name' => 'show-employee']);
        $employee_edit = Permission::create(['name' => 'edit-employee']);
        $employee_create = Permission::create(['name' => 'create-employee']);
        $employee_delete = Permission::create(['name' => 'delete-employee']);

        $permissions_admin =[
            $permission_edit,
            $permission_create,
            $permission_delete,
            $employee_show,
            $employee_edit,
            $employee_create,
            $employee_delete
        ];

        $permissions_editor =[
            $permission_edit,
            $employee_show,
            $employee_edit,
        ];

        $permissions_standard =[
            $employee_show,

        ];

        $role_admin->syncPermissions($permissions_admin);

        $role_standard->givePermissionTo($permissions_standard);
        $role_editor->givePermissionTo($permissions_editor);
    }
}
