<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('doctor_educations', function (Blueprint $table) {
            $table->date('graduation_year_start_ad')->nullable()->after('graduation_year_start');
            $table->date('graduation_year_end_ad')->nullable()->after('graduation_year_end');
        });

        Schema::table('doctor_experiences', function (Blueprint $table) {
            $table->date('org_start_ad')->nullable()->after('start_date');
            $table->date('org_end_ad')->nullable()->after('end_date');
        });
    }

    public function down(): void
    {
        Schema::table('doctor_educations', function (Blueprint $table) {
            $table->dropColumn(['graduation_year_start_ad', 'graduation_year_end_ad']);
        });

        Schema::table('doctor_experiences', function (Blueprint $table) {
            $table->dropColumn(['org_start_ad', 'org_end_ad']);

        });
    }
};

