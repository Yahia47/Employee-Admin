<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin', 'password' => bcrypt('admin123')]
        );
        //Employee
        $employee = Employee::firstOrCreate(
            ['email' => 'user@example.com'],
            ['name' => 'User Employee', 'password' => bcrypt('user12')]
        );

        $roleAdmin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $roleEmployee = Role::firstOrCreate(['name' => 'Employee', 'guard_name' => 'employee']);

        $admin->assignRole($roleAdmin);
        $employee->assignRole($roleEmployee);
    }
}
