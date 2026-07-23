<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const ADMIN_ROLE = 7128;

    private const ADMIN_EMAIL = 'admin@valoto.test';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('role')->nullable()->after('password');
        });

        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => self::ADMIN_EMAIL,
            'password' => Hash::make('@p6cV94vgWTPicQcSX2Xri'),
            'role' => self::ADMIN_ROLE,
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('users')->where('email', self::ADMIN_EMAIL)->delete();

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
