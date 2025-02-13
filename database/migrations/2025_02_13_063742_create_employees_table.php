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
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('employee_number')->nullable()->unique();
            $table->foreign('employee_number')->references('identifier')->on('users')->onDelete('set null');
            $table->string('title')->nullable(); // Dr., Engr., Prof., etc.
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->string('department');
            $table->enum('status', ['active', 'inactive', 'retired'])->default('active');
            $table->string('position')->nullable();
            $table->date('hire_date')->nullable();
            $table->string('gender')->nullable();
            $table->text('address')->nullable();
            $table->enum('teaching_status', ['teaching', 'non-teaching'])->default('non-teaching');
            $table->string('specialization')->nullable();
            $table->decimal('salary', 10, 2)->nullable();
            $table->date('birth_date')->nullable();
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculties');
    }
};
