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
        Schema::table('doctors', function (Blueprint $table) {
            $table->foreignId('temp_country_id')->constrained('countries')->after('country_id');
            $table->foreignId('temp_province_id')->constrained('provinces')->after('province_id');
            $table->foreignId('temp_district_id')->constrained('districts')->after('district_id');
            $table->foreignId('temp_municipality_id')->constrained('municipalities')->after('municipality_id');
            $table->string('temp_street')->after('street');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
