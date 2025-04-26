<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('domains')->insert([
            'name' => 'example.com',
            'is_active' => true,
            'mx_record' => 'mail.example.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('domains')->where('name', 'example.com')->delete();
    }
};
