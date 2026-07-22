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
        Schema::create('previous_draws', function (Blueprint $table) {
            $table->id();
            $table->date('draw_date');
            $table->unsignedTinyInteger('number_1');
            $table->unsignedTinyInteger('number_2');
            $table->unsignedTinyInteger('number_3');
            $table->unsignedTinyInteger('number_4');
            $table->unsignedTinyInteger('number_5');
            $table->timestamps();

            $table->index('draw_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('previous_draws');
    }
};
