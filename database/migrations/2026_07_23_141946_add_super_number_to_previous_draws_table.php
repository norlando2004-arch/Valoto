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
            $table->unsignedTinyInteger('super_number')->nullable()->after('number_5');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('previous_draws', function (Blueprint $table) {
            $table->dropColumn('super_number');
        });
    }
};
