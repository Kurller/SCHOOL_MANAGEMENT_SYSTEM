<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('school_settings', function (Blueprint $table) {
            if (!Schema::hasColumn('school_settings', 'logo')) {
                $table->string('logo')->nullable()->after('current_term');
            }

            if (!Schema::hasColumn('school_settings', 'principal_signature')) {
                $table->string('principal_signature')->nullable();
            }

            if (!Schema::hasColumn('school_settings', 'school_stamp')) {
                $table->string('school_stamp')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('school_settings', function (Blueprint $table) {
            if (Schema::hasColumn('school_settings', 'logo')) {
                $table->dropColumn('logo');
            }

            if (Schema::hasColumn('school_settings', 'principal_signature')) {
                $table->dropColumn('principal_signature');
            }

            if (Schema::hasColumn('school_settings', 'school_stamp')) {
                $table->dropColumn('school_stamp');
            }
        });
    }
};