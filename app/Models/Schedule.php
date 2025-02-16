<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_code',
        'subject_code',
        'faculty_number',
        'section',
        'room',
        'day',
        'start_time',
        'end_time',
        'semester',
        'school_year',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_code', 'subject_code');
    }

    public function faculty()
    {
        return $this->belongsTo(Employee::class, 'faculty_number', 'employee_number');
    }
}
