<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('phone');
            $table->text('message');
            $table->string('ip_address')->nullable(); // Optional: track user IP
            $table->string('user_agent')->nullable(); // Optional: track browser/device
            $table->timestamp('read_at')->nullable(); // Optional: mark as read in admin panel
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_submissions');
    }
};