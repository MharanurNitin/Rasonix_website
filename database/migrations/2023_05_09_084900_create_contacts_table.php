<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Queue\Connectors\NullConnector;
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
            $table->string('business_email')->nullable()->default(null);
            $table->string('phone_number');
            $table->string('company_name')->nullable()->default(null);
            $table->longText('message')->nullable()->default(null);
            $table->boolean('replied')->default(false);
            $table->longText('reply')->nullable()->default(null);
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
