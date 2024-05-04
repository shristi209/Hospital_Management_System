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
        Schema::table('doctor_experiences', function (Blueprint $table) {
            $table->dropForeign(['doctor_id']);
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
        });

        Schema::table('doctor_educations', function (Blueprint $table) {
            $table->dropForeign(['doctor_id']);
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */

        public function down()
    {
        Schema::table('doctor_experiences', function (Blueprint $table) {
            $table->dropForeign(['doctor_id']);
            $table->foreign('doctor_id')->references('id')->on('doctors');
        });

        Schema::table('doctor_educations', function (Blueprint $table) {
            $table->dropForeign(['doctor_id']);
            $table->foreign('doctor_id')->references('id')->on('doctors');
        });
    }
    
};
