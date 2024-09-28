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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->comment('User ID who created the project'); 

            $table->string('title', 255)->comment('Title of the project');
            $table->date('start_date')->comment('Start date of the project');
            $table->date('end_date')->nullable()->comment('End date of the project');
            $table->enum('status', ['Completed', 'In progress'])->comment('Project status');
            $table->string('file_path', 255)->nullable()->comment('Path to the uploaded project file');

            // Relationships
            $table->json('members')->nullable()->comment('List of student members involved in the project (JSON format)');
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
        Schema::dropIfExists('projects');
    }
};
