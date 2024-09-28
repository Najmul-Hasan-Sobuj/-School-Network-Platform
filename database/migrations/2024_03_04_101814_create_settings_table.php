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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('whatsapp_chat_url')->nullable();
            $table->text('google_map_url')->nullable();
            $table->text('facebook_url')->nullable();
            $table->text('youtube_url')->nullable();
            $table->text('gmail_url')->nullable();
            $table->string('site_logo', 100)->nullable();
            $table->string('login_page_bg_image', 100)->nullable();
            $table->string('site_name', 60)->nullable();
            $table->string('address')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('meta_title', 200)->nullable();
            $table->string('meta_image', 100)->nullable();
            $table->string('meta_keywords', 255)->nullable();
            $table->string('meta_description', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
