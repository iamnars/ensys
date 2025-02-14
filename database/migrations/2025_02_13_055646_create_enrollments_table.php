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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('student_number')->nullable();
            $table->foreign('student_number')->references('student_number')->on('students')->onDelete('set null');

            $table->string('schedule_code')->nullable();
            $table->foreign('schedule_code')->references('schedule_code')->on('schedules')->onDelete('set null');

            $table->integer('semester');
            $table->string('school_year', 9);
            $table->enum('status', ['enrolled', 'dropped', 'pending', 'completed'])->default('enrolled');
            $table->timestamp('enrolled_at')->nullable();
            $table->text('remarks')->nullable();
            $table->string('receipt_number');
            $table->timestamps(); // Creates 'created_at' and 'updated_at'
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
