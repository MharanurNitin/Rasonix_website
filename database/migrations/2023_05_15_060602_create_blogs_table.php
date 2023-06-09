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
        Schema::create('blogs', function (Blueprint $table) {

            $table->id();
            $table->integer('category_id');
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->string('image')->nullable()->default(null);
            $table->string('thumbnail_image')->nullable()->default(null);
            $table->enum('status', ['visible', 'hidden'])->default('hidden');
            $table->text('tags')->nullable()->default(null);
            $table->string('meta_title');
            $table->text('meta_description')->nullable()->default(null);
            $table->text('meta_keyword')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
