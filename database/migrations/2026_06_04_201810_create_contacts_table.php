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

            $table->enum('type', ['mobile', 'phone', 'email', 'WhatsApp', 'telegram'])->default('mobile');
            $table->string('value', 150);
            $table->string('label', 20)->nullable();

            $table->boolean('is_verified')->default(false);
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->unique(['type', 'value']);

            $table->index('type');
            $table->index('is_active');
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
