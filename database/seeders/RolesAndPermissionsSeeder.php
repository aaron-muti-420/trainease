<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder {
    public function run() {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $trainerRole = Role::create(['name' => 'trainer']);
        $staffRole = Role::create(['name' => 'staff']);

        $userAdmin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $userTrainer = User::create([
            'name' => 'Trainer',
            'email' => 'trainer@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $userStaff = User::create([
            'name' => 'Staff',
            'email' => 'staff@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $userAdmin->assignRole($adminRole);
        $userTrainer->assignRole($trainerRole);
        $userStaff->assignRole($staffRole);

    }
}
