<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('municipalities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('municipality_type_id')->constrained('municipality_types');
            $table->foreignId('dictrict_id')->constrained('districts');
            $table->string('municipality_code');
            $table->string('nep_municipality_name');
            $table->timestamps();
            $table->softDeletes();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('municipalities');
    }
};
