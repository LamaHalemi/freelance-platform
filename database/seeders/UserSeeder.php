<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'bio' => 'Platform Administrator',
            'avatar' => null,
        ]);

        // Customers
        User::factory()->count(3)->create([
            'role' => 'customer',
        ]);

        // Freelancers
        User::factory()->count(3)->create([
            'role' => 'freelancer',
        ]);
    }
}
