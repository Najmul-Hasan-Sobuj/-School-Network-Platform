<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'group_name' => 'Dashboard',
                'permissions' => [
                    'dashboard.view',
                ]
            ],
            [
                'group_name' => 'User',
                'permissions' => [
                    'admin.index',
                    'admin.create',
                    'admin.edit',
                    'admin.update',
                    'admin.delete',
                ]
            ],
            [
                'group_name' => 'Role',
                'permissions' => [
                    'role.index',
                    'role.create',
                    'role.edit',
                    'role.update',
                    'role.delete',
                ]
            ],
            [
                'group_name' => 'Category',
                'permissions' => [
                    'category.index',
                    'category.create',
                    'category.show',
                    'category.edit',
                    'category.update',
                    'category.delete',
                ]
            ],
            [
                'group_name' => 'Email Settings',
                'permissions' => [
                    'email.update',
                    'email.sendTest',
                ]
            ],
            [
                'group_name' => 'Privacy Policy',
                'permissions' => [
                    'privacy-policy.view',
                    'privacy-policy.update',
                ]
            ],
            [
                'group_name' => 'Terms and Conditions',
                'permissions' => [
                    'terms-and-condition.view',
                    'terms-and-condition.update',
                ]
            ],
            [
                'group_name' => 'Settings',
                'permissions' => [
                    'setting.view',
                    'setting.update',
                ]
            ],
            [
                'group_name' => 'Password',
                'permissions' => [
                    'password.update',
                ]
            ],
            // Add other permission groups as needed
        ];

        // Create admin role for the 'admin' guard
        $roleAdmin = Role::create(['name' => 'admin', 'guard_name' => 'admin']);

        // Create and Assign Permissions
        foreach ($permissions as $group) {
            $permissionGroup = $group['group_name'];
            foreach ($group['permissions'] as $permissionName) {
                // Create Permission
                $permission = Permission::firstOrCreate([
                    'name' => $permissionName,
                    'group_name' => $permissionGroup,
                    'guard_name' => 'admin'
                ]);
                // Assign permission to admin role
                $roleAdmin->givePermissionTo($permission);
            }
        }

        // Retrieve the admin user by email or any other unique identifier
        $admin = Admin::where('email', 'admin@gmail.com')->first();

        // Assign admin role to admin user
        if ($admin) {
            $admin->assignRole($roleAdmin);
        }
    }
}
