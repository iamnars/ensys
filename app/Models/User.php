<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'identifier',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => UserRole::class, // Cast role as Enum
    ];

    /**
     * Relationships
     */
    public function student()
    {
        return $this->hasOne(Student::class, 'student_number', 'identifier');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'employee_number', 'identifier');
    }

    /**
     * Generic Role Checking
     */
    public function hasRole(UserRole $role): bool
    {
        return $this->role === $role;
    }

    /**
     * Shorthand Role Checkers
     */
    public function isCashier(): bool
    {
        return $this->hasRole(UserRole::CASHIER);
    }

    public function isFinOfficer(): bool
    {
        return $this->hasRole(UserRole::FIN_OFFICER);
    }

    public function isAsstFinOfficer(): bool
    {
        return $this->hasRole(UserRole::ASST_FIN_OFFICER);
    }

    public function isAdmin(): bool
    {
        return $this->hasRole(UserRole::ADMIN);
    }

    public function isFaculty(): bool
    {
        return $this->hasRole(UserRole::FACULTY);
    }

    public function isRegistrar(): bool
    {
        return $this->hasRole(UserRole::REGISTRAR);
    }

    public function isAsstRegistrar(): bool
    {
        return $this->hasRole(UserRole::ASST_REGISTRAR);
    }

    public function isStudent(): bool
    {
        return $this->hasRole(UserRole::STUDENT);
    }
}
