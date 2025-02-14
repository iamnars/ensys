<?php

namespace Database\Factories;

use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $year = now()->format('y'); // Get last 2 digits of the year
        $uniqueNumber = str_pad($this->faker->unique()->numberBetween(1, 99999), 5, '0', STR_PAD_LEFT);
        return [
            'identifier' => "{$year}-{$uniqueNumber}", // Format: YY-00000
            'email' => $this->faker->boolean(80) ? $this->faker->unique()->safeEmail() : null,
            'password' => Hash::make('password123'), // Default hashed password
            'role' => UserRole::STUDENT,
            // 'role' => $this->faker->randomElement(UserRole::cases()), // Random role from Enum
        ];
    }
}
