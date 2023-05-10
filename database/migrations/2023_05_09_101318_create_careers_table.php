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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('category'); // is this enum field 
            $table->string('sub_category'); //check enum field
            $table->string('vacancies');
            $table->string('image')->nullable()->default(null);
            $table->string('thumbnail_image')->nullable()->default(null);

            $table->timestamps();
            // 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
