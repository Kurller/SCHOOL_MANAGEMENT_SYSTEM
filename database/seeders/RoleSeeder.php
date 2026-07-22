<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Admin',
            'Principal',
            'Teacher',
            'Accountant',
            'Student',
            'Parent',
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate([
                'name' => $role
            ]);
        }
    }
}