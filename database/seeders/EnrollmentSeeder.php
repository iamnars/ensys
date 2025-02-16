<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Enrollment;

class EnrollmentSeeder extends Seeder
{
    public function run()
    {
        Enrollment::factory()->count(10)->create();
    }
}
