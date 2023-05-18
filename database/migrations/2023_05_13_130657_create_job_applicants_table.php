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
        Schema::create('job_applicants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('career_id')->unsigned();
            $table->foreign('career_id')->references('id')->on('careers')->onDelete('cascade');
            $table->string('phone_no')->unique();
            $table->string('email')->unique();
            $table->string('address')->nullable()->default(null);
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('resume');
            //$table->string('profile_image')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applicants');
    }
};
