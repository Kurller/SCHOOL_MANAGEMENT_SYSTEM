<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fees', function (Blueprint $table) {

            $table->id();

            $table->foreignId('student_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('school_class_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('term');

            $table->string('session');

            $table->decimal('amount_due',10,2);

            $table->decimal('amount_paid',10,2)
                ->default(0);

            $table->decimal('balance',10,2);

            $table->date('payment_date')
                ->nullable();

            $table->string('payment_method')
                ->nullable();

            $table->string('receipt_number')
                ->nullable();

            $table->enum('status',[
                'Paid',
                'Part Payment',
                'Unpaid'
            ])->default('Unpaid');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};