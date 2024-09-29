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
                'group_name' => 'Password Management',
                'permissions' => [
                    'password.update',
                ]
            ],
            [
                'group_name' => 'Student Management',
                'permissions' => [
                    'student.index',
                    'student.show',
                    'student.delete',
                    'student.approve',
                ]
            ],
            [
                'group_name' => 'Project Management',
                'permissions' => [
                    'project.index',
                    'project.create',
                    'project.show',
                    'project.edit',
                    'project.update',
                    'project.delete',
                ]
            ],
            [
                'group_name' => 'Reading Management',
                'permissions' => [
                    'reading.index',
                    'reading.create',
                    'reading.show',
                    'reading.edit',
                    'reading.update',
                    'reading.delete',
                ]
            ],
            [
                'group_name' => 'School Management',
                'permissions' => [
                    'school.index',
                    'school.create',
                    'school.show',
                    'school.edit',
                    'school.update',
                    'school.delete',
                ]
            ],
        ];

        // Create admin role for the 'admin' guard
        $roleAdmin = Role::create(['name' => 'Super Admin', 'guard_name' => 'admin']);

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

        if ($admin) {
            $admin->assignRole($roleAdmin);
        } else {
            $this->command->error('Admin user not found. Run AdminSeeder first.');
        }
    }
}
