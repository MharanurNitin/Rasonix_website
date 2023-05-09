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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('business_email')->nullable();
            $table->string('phone_number');
            $table->string('company_name')->nullable();
            $table->longText('message')->nullable();
            $table->enum('block_status', ['blocked_email', 'blocked_phone', 'unblocked'])->default('unblocked');
            $table->boolean('replied')->default(false);
            $table->longText('reply')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
