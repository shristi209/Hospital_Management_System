<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->enum('status', ['available', 'unavailable'])->default('available')->after('doctor_id');
            $table->enum('day', ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday','friday', 'saturday' ])->after('schedule_date');

        });
    }

    public function down()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('day');
        });
    }
};
