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
        // Create 10 users with random roles
        User::factory()->count(10)->create();
    }
}
