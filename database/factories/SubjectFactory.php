<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Subject;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    protected $model = Subject::class;

    public function definition(): array
    {
        return [
            'subject_code' => $this->faker->unique()->bothify('SUBJ###'),
            'description' => $this->faker->sentence(3),
            'unit'         => $this->faker->randomFloat(2, 1, 5), // Random unit value between 1.00 and 5.00
            'program_code' => $this->faker->randomElement(['IT', 'ME', 'CA', 'NME']),
            'year_level'   => $this->faker->numberBetween(1, 4),
            'semester'     => $this->faker->numberBetween(1, 2),
        ];
    }
}
