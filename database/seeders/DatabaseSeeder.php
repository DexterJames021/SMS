<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test Admin',
            'usertype' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin123',
        ]);
        User::factory()->create([
            'name' => 'Test Student',
            'usertype' => 'student',
            'email' => 'student@gmail.com',
            'password' => 'student123',
        ]);
    }
}