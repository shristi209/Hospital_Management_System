<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'edit doctor',
            'delete doctor',
            'create doctor',
            'view doctor',

            'edit department',
            'delete department',
            'create department',
            'view department',

            'edit user',
            'delete user',
            'create user',
            'view user',

            'restore doctortrash',
            'delete doctortrash',
            'view doctortrash',

            'restore departmenttrash',
            'delete departmenttrash',
            'view departmenttrash',

            'restore usertrash',
            'delete usertrash',
            'view usertrash',

            'edit appointment',
            'view appointment',

        ];

        foreach($permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }
    }
}
