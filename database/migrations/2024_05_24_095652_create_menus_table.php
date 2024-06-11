<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->json('menu');
            $table->integer('menu_type');
            $table->foreignId('page_id')->constrained('pages')->nullable();
            $table->foreignId('modal_id')->constrained('modals')->nullable();
            $table->string('link')->nullable();
            $table->foreignId('parent_id')->constrained('menus')->nullable();
            $table->integer('display_order');
            $table->boolean('status')->comment('1 = active, 0 = inactive');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
