<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Crear roles
        $adminRole = Role::create(['name' => 'admin']);
        $supportRole = Role::create(['name' => 'support']);
        $userRole = Role::create(['name' => 'user']);
    
        // Crear usuarios
        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password')
        ]);
        $adminUser->assignRole($adminRole);
    
        $supportUser = User::create([
            'name' => 'Support User',
            'email' => 'support@example.com',
            'password' => bcrypt('password')
        ]);
        $supportUser->assignRole($supportRole);
    
        $regularUser = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => bcrypt('password')
        ]);
        $regularUser->assignRole($userRole);
    }
}
