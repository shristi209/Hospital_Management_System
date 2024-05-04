<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
            // Add foreign key constraint for province_id
            $table->foreignId('province_id')->constrained('provinces');

            // Add foreign key constraint for district_id
            $table->foreignId('district_id')->constrained('districts');

            // Add foreign key constraint for municipality_id
            $table->foreignId('municipality_id')->constrained('municipalities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctors', function (Blueprint $table) {
            // Drop foreign key constraint for province_id
            $table->dropForeign(['province_id']);

            // Drop foreign key constraint for district_id
            $table->dropForeign(['district_id']);

            // Drop foreign key constraint for municipality_id
            $table->dropForeign(['municipality_id']);
        });
    }
};
