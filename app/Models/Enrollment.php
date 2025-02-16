<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_number',
        'schedule_code',
        'semester',
        'school_year',
        'status',
        'enrolled_at',
        'remarks',
        'receipt_number',
        'updated_by',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_number', 'student_number');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_code', 'schedule_code');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
