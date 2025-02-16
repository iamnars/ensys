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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('schedule_code')->nullable()->unique(); 
            $table->string('subject_code')->nullable();
            $table->foreign('subject_code')->references('subject_code')->on('subjects')->onDelete('set null');
            $table->string('faculty_number')->nullable();
            $table->foreign('faculty_number')->references('employee_number')->on('employees')->onDelete('set null');
            $table->string('section',3);
            $table->string('room',10);
            $table->string('day',5);
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('semester');
            $table->string('school_year', 9);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
