<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the admin user
        User::create([
            'name' => 'Admin User', // Admin name
            'email' => 'admin@yopmail.com', // Admin email
            'password' => Hash::make('admin123'), // Admin password (hashed)
            'role' => 'admin', // Assign role as admin
        ]);
    }
}
