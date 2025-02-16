<?php

namespace Database\Factories;

use App\Models\Schedule;
use App\Models\Subject;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    protected $model = Schedule::class;

    public function definition()
    {
        return [
            'schedule_code' => 'SCH-' . $this->faker->unique()->randomNumber(5),
            'subject_code' => Subject::inRandomOrder()->value('subject_code'), // Random subject
            'faculty_number' => Employee::inRandomOrder()->value('employee_number'), // Random faculty
            'section' => $this->faker->randomElement(['A', 'B', 'C']),
            'room' => 'RM-' . $this->faker->numberBetween(200, 300),
            'day' => $this->faker->randomElement(['MTH', 'TF', 'Wed', 'Sat']),
            'start_time' => $this->faker->time('H:i:s'),
            'end_time' => $this->faker->time('H:i:s'),
            'semester' => $this->faker->randomElement([1, 2]),
            'school_year' => '2024-2025',
        ];
    }
}
