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
        Schema::create('temporary_emails', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('local_part'); // Username part of email
            $table->foreignId('domain_id')->constrained()->cascadeOnDelete();
            $table->timestamp('expires_at');
            $table->timestamps();
            
            // Index for faster lookups
            $table->index(['local_part', 'domain_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temporary_emails');
    }
};
