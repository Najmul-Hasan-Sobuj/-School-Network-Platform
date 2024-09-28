<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('readings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->comment('User ID who added the reading'); 

            $table->string('title', 255)->comment('Title of the reading material');
            $table->string('doi', 50)->nullable()->comment('DOI of the reading material (if applicable)');
            $table->year('year')->comment('Publication year of the reading material');
            $table->enum('type', ['Book', 'Magazine', 'Article'])->comment('Type of reading material');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('readings');
    }
};
