<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('draw_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('number_1');
            $table->unsignedTinyInteger('number_2');
            $table->unsignedTinyInteger('number_3');
            $table->unsignedTinyInteger('number_4');
            $table->unsignedTinyInteger('number_5');
            $table->unsignedTinyInteger('super_number');
            $table->unsignedInteger('draw_number');
            $table->date('draw_date');
            $table->timestamps();
        });

        DB::table('draw_results')->insert([
            'number_1' => 2,
            'number_2' => 11,
            'number_3' => 19,
            'number_4' => 27,
            'number_5' => 40,
            'super_number' => 5,
            'draw_number' => 2531,
            'draw_date' => now()->toDateString(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('draw_results');
    }
};
