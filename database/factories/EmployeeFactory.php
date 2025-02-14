<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition(): array
    {
        return [
            'employee_number' => User::factory()->create(['role' => 'faculty'])->identifier, // Generates a User with a faculty role
            'title' => $this->faker->optional()->randomElement(['Dr.', 'Engr.', 'Prof.', 'Mr.', 'Ms.', 'Mrs.']),
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->optional()->lastName(),
            'last_name' => $this->faker->lastName(),
            'suffix' => $this->faker->optional()->randomElement(['Jr.', 'Sr.', 'III']),
            'department' => $this->faker->randomElement(['IT', 'CS', 'Math', 'Engineering']),
            'status' => $this->faker->randomElement(['active', 'inactive', 'retired']),
            'position' => $this->faker->optional()->randomElement(['Instructor', 'Professor', 'Dean']),
            'hire_date' => $this->faker->optional()->date(),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'address' => $this->faker->address(),
            'teaching_status' => $this->faker->randomElement(['teaching', 'non-teaching']),
            'specialization' => $this->faker->optional()->word(),
            'salary' => $this->faker->optional()->randomFloat(2, 30000, 100000),
            'birth_date' => $this->faker->optional()->date(),
        ];
    }
}
