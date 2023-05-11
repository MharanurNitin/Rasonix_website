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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_no')->unique();
            $table->string('password')->nullable()->dafault(null);
            $table->string('remember_token')->nullable()->dafault(null);
            $table->enum('role', ['guest', 'user', 'editor', 'admin', 'super_admin'])->default('guest');
            $table->string('profile_image')->nullable()->default(null);
            $table->timestamp('joining_date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('block_status')->default(false);
            //$table->timestamp('deleted_at')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
