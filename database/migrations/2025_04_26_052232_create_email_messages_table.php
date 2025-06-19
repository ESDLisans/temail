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
        Schema::create('email_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('temp_email_id')->constrained('temporary_emails')->cascadeOnDelete();
            $table->string('message_id')->nullable();
            $table->string('from');
            $table->string('subject')->nullable();
            $table->text('body_html')->nullable();
            $table->text('body_text')->nullable();
            $table->json('headers')->nullable();
            $table->boolean('is_read')->default(false);
            $table->boolean('is_starred')->default(false);
            $table->foreignId('in_reply_to_id')->nullable()->references('id')->on('email_messages')->nullOnDelete();
            $table->timestamp('received_at');
            $table->timestamps();
            
            // Add index for faster lookups
            $table->index('message_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_messages');
    }
};
