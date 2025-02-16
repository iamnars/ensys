<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_number',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'gender',
        'birthdate',
        'contact_number',
        'address',
        'program',
        'year_level',
        'status',
        'guardian_name',
        'guardian_contact',
        'enrolled_at',
    ];

    protected $casts = [
        'birthdate' => 'date',
        'enrolled_at' => 'date',
    ];

    /**
     * Relationship: A student belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'student_number', 'identifier');
    }
}
