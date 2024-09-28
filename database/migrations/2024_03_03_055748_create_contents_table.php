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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('author_id')->constrained()->cascadeOnDelete();
            $table->string('title', 200);
            $table->string('slug', 255)->nullable()->unique();
            $table->string('image', 100)->nullable();
            $table->text('description')->comment('ckeditor')->nullable();
            $table->string('meta_title', 200)->nullable();
            $table->string('meta_image', 100)->nullable();
            $table->string('meta_description', 255)->nullable();
            $table->string('meta_keywords')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=publish , 0=Un publish');
            $table->unsignedBigInteger('view_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
