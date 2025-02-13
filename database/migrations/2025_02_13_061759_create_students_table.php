<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_number')->nullable()->unique();
            $table->foreign('student_number')->references('identifier')->on('users')->onDelete('set null');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->string('gender');
            $table->date('birthdate');
            $table->string('contact_number')->nullable();
            $table->string('address')->nullable();
            $table->string('program');
            $table->integer('year_level');
            $table->enum('status', ['active', 'inactive', 'graduated', 'dropped'])->default('active');
            $table->timestamp('enrolled_at')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_contact')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
