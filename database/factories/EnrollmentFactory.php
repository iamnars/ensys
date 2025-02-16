<?php

namespace Database\Factories;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnrollmentFactory extends Factory
{
    protected $model = Enrollment::class;

    public function definition()
    {
        return [
            'student_number' => Student::inRandomOrder()->value('student_number'), // Random student
            'schedule_code' => Schedule::inRandomOrder()->value('schedule_code'), // Random schedule
            'semester' => 1,
            'school_year' => '2024-2025',
            'status' => 'enrolled',
            'enrolled_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'remarks' => $this->faker->optional()->sentence(2),
            'receipt_number' => 'RCPT-' . $this->faker->unique()->randomNumber(6),
            'updated_by' => User::inRandomOrder()->value('id'), // Random user
        ];
    }
}
