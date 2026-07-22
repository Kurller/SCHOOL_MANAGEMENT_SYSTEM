<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('results');

        Schema::create('results', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('school_class_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('subject_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('term');
            $table->string('session');

            $table->decimal('ca_score',5,2)->default(0);
            $table->decimal('exam_score',5,2)->default(0);
            $table->decimal('total_score',5,2)->default(0);

            $table->string('grade');
            $table->string('remark');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};