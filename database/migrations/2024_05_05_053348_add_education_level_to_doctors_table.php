<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEducationLevelToDoctorsTable extends Migration
{
    public function up()
    {
        Schema::table('doctor_educations', function (Blueprint $table) {
            $table->enum('education_level', ['Secondary Level', 'Higher Secondary Level', 'Diploma', 'Bachelors Level', 'Masters Level', 'PhD']);
        });
    }

    public function down()
    {
        Schema::table('doctor_educations', function (Blueprint $table) {
            $table->dropColumn('education_level');
        });
    }
}
