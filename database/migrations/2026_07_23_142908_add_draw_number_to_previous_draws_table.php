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
        Schema::table('previous_draws', function (Blueprint $table) {
            $table->unsignedInteger('draw_number')->nullable()->unique()->after('draw_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('previous_draws', function (Blueprint $table) {
            $table->dropColumn('draw_number');
        });
    }
};
