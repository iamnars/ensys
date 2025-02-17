<?php

namespace App\Http\Controllers;
use App\Models\Student; // Import Student model
use App\Models\Enrollment; // Import Enrollment model
use Illuminate\Http\Request;

class GradingController extends Controller
{
    public function grading($schedule_code)
    {
        // Get enrolled students based on the schedule_code
        $students = Enrollment::where('schedule_code', $schedule_code)
        ->join('students', 'enrollments.student_number', '=', 'students.student_number')
        ->select('students.*') // Select student details
        ->orderBy('students.last_name', 'asc') // Order by last name ascending
        ->get();

        return view('grading', compact('schedule_code', 'students'));
    }
}
