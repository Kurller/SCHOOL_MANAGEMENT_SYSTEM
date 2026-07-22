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

            // Student Information
            $table->string('student_id')->unique();
            $table->string('admission_number')->nullable()->unique();

            $table->string('first_name');
            $table->string('last_name');

            $table->date('date_of_birth');
            $table->date('admission_date')->nullable();

            $table->enum('gender', ['Male', 'Female']);

            // Contact Information
            $table->string('phone')->nullable();
            $table->string('email')->nullable()->unique();
            $table->text('address')->nullable();

            // Guardian Information
            $table->string('guardian_name')->nullable();
            $table->string('guardian_phone')->nullable();

            // Student Photo
            $table->string('photo')->nullable();

            // Student Status
            $table->enum('status', ['Active', 'Inactive'])
                  ->default('Active');

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