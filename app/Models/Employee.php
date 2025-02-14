<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_number',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'department',
        'status',
        'position',
        'hire_date',
        'gender',
        'address',
        'teaching_status',
        'specialization',
        'salary',
        'birth_date',
    ];

    /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'employee_number', 'identifier');
    }

    /**
     * Accessors for Full Name
     */
    public function getFullNameAttribute()
    {
        return trim("{$this->title} {$this->first_name} {$this->middle_name} {$this->last_name} {$this->suffix}");
    }
}
