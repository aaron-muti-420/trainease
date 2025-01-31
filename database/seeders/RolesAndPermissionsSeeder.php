<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder {
    public function run() {
         // Create roles


         // Create users with the new fields
         $userAdmin = User::create([
             'first_name' => 'Admin',
             'last_name' => 'User',
             'salary_ref_number' => 1001,
             'gender' => 'Male',
             'dob' => now()->subYears(30), // Example date of birth
             'role' => 'admin',  // Explicitly set the role field
             'points' => 0,
             'email' => 'admin@gmail.com',
             'email_verified_at' => now(),
             'password' => bcrypt('password'),
             'profile_photo_path' => null, // Example profile photo path, null for now
             'current_team_id' => null,
         ]);

         $userTrainer = User::create([
             'first_name' => 'Trainer',
             'last_name' => 'User',
             'salary_ref_number' => 1002,
             'gender' => 'Female',
             'dob' => now()->subYears(25), // Example date of birth
             'role' => 'trainer',
             'points' => 0,
             'email' => 'trainer@gmail.com',
             'email_verified_at' => now(),
             'password' => bcrypt('password'),
             'profile_photo_path' => null,
             'current_team_id' => null,
         ]);

         $userStaff = User::create([
             'first_name' => 'Staff',
             'last_name' => 'User',
             'salary_ref_number' => 1003,
             'gender' => 'Non-binary',
             'dob' => now()->subYears(28), // Example date of birth
             'role' => 'staff',
             'points' => 0,
             'email' => 'staff@gmail.com',
             'email_verified_at' => now(),
             'password' => bcrypt('password'),
             'profile_photo_path' => null,
             'current_team_id' => null,
         ]);

         // Assign roles to users
         $userAdmin->assignRole('admin');
         $userTrainer->assignRole('trainer');
         $userStaff->assignRole('staff');

         $this->command->info('Roles and users seeded successfully!');

    }
}
