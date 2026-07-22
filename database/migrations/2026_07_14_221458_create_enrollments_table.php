<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enrollments', function (Blueprint $table) {

            $table->id();

            $table->foreignId('student_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('school_class_id')
                ->constrained('school_classes')
                ->cascadeOnDelete();

            $table->string('academic_session');

            $table->enum('status', [
                'Active',
                'Graduated',
                'Transferred',
                'Suspended'
            ])->default('Active');

            $table->timestamps();

            $table->unique([
                'student_id',
                'school_class_id',
                'academic_session'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};