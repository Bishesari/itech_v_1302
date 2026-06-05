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
        Schema::create('institutes', function (Blueprint $table) {

            $table->id();

            // اطلاعات اصلی
            $table->string('short_name', 30);
            $table->string('full_name', 100);
            $table->string('slug', 50)->unique();

            // کد اختصاری یکتا برای سیستم
            $table->char('abbr', 5)->unique(); // مثلا: KAA, TCI, ALF01

            // وضعیت فعال بودن موسسه
            $table->boolean('is_active')->default(true)->index();

            // لوگو
            $table->string('logo_url')->nullable(); // 255 پیشفرض

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutes');
    }
};
