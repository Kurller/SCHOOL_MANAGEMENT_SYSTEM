<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('school_settings', function (Blueprint $table) {
            $table->string('logo')->nullable()->after('current_term');
            $table->string('principal_signature')->nullable()->after('logo');
            $table->string('school_stamp')->nullable()->after('principal_signature');
        });
    }

    public function down(): void
    {
        Schema::table('school_settings', function (Blueprint $table) {
            $table->dropColumn([
                'logo',
                'principal_signature',
                'school_stamp',
            ]);
        });
    }
};