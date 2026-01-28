<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Create petugas user
        User::create([
            'name' => 'Petugas',
            'email' => 'petugas@example.com',
            'password' => bcrypt('password'),
            'role' => 'petugas',
        ]);

        // Create test user
        User::factory()->create([
            'name' => 'herry',
            'email' => 'herry@example.com',
            'password' => bcrypt('password'),
            'role' => 'petugas',
        ]);

        $this->call([
            CategorySeeder::class,
            LocationSeeder::class,
            AsetSeeder::class,
            // UserSeeder::class,
        ]);
    }
}
