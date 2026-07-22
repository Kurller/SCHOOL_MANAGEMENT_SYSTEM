<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {

            $table->id();

            $table->string('teacher_id')->unique();

            $table->string('staff_number')->unique()->nullable();

            $table->string('first_name');

            $table->string('last_name');

            $table->date('date_of_birth');

            $table->enum('gender', ['Male', 'Female']);

            $table->string('phone')->nullable();

            $table->string('email')->unique();

            $table->text('address')->nullable();

            $table->string('qualification');

            $table->string('specialization')->nullable();

            $table->date('employment_date');

            $table->decimal('salary', 10, 2)->nullable();

            $table->string('photo')->nullable();

            $table->enum('status', ['Active', 'Inactive'])
                  ->default('Active');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};