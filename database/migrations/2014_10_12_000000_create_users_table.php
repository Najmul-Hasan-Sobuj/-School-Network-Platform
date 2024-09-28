<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable()->comment('Full name of the user');
            $table->enum('gender', ['M', 'F'])->nullable()->comment('Gender of the user: M (Male), F (Female)');
            $table->string('address', 255)->nullable()->comment('Residential address of the user');
            $table->string('country', 100)->nullable()->comment('Country of the user');
            $table->date('dob')->nullable()->comment('Date of birth of the user');
            $table->string('phone', 15)->nullable()->comment('Phone number of the user');
            $table->string('email', 100)->unique()->comment('Email address of the user');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // Insert initial user
        DB::table('users')->insert([
            'name' => Str::random(10),
            'gender' => 'M',
            'address' => '123 Main Street',
            'country' => 'Bangladesh',
            'dob' => '1995-05-15',
            'phone' => '0123456789',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('user123'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
