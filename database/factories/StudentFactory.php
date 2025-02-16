<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        // Ensure only users with 'student' role are used
        $user = User::factory()->create(['role' => \App\Enums\UserRole::STUDENT]);

        return [
            'student_number' => $user->identifier, // Use the same identifier from User
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->optional()->firstName,
            'last_name' => $this->faker->lastName,
            'suffix' => $this->faker->optional()->suffix,
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'birthdate' => $this->faker->date,
            'contact_number' => $this->faker->optional()->phoneNumber,
            'address' => $this->faker->address,
            'program' => $this->faker->randomElement(['BSIT', 'BSCS', 'BSECE', 'BSCE']), // Example programs
            'year_level' => $this->faker->numberBetween(1, 4), // Year level (1-4)
            'status' => 'old',
            'enrolled_at' => $this->faker->date,
            'guardian_name' => $this->faker->name,
            'guardian_contact' => $this->faker->phoneNumber,
            
        ];
    }
}
