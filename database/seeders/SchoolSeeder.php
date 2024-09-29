<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = [
            ['name' => 'Dhaka International School', 'address' => 'Dhaka, Bangladesh', 'country' => 'Bangladesh'],
            ['name' => 'International School Dhaka', 'address' => 'Dhaka, Bangladesh', 'country' => 'Bangladesh'],
            ['name' => 'Scholastica', 'address' => 'Dhaka, Bangladesh', 'country' => 'Bangladesh'],
            ['name' => 'Mastermind School', 'address' => 'Dhaka, Bangladesh', 'country' => 'Bangladesh'],
            ['name' => 'British International School', 'address' => 'Dhaka, Bangladesh', 'country' => 'Bangladesh'],
            ['name' => 'Maple Leaf International School', 'address' => 'Dhaka, Bangladesh', 'country' => 'Bangladesh'],
            ['name' => 'BAF Shaheen College', 'address' => 'Dhaka, Bangladesh', 'country' => 'Bangladesh'],
            ['name' => 'Notre Dame College', 'address' => 'Dhaka, Bangladesh', 'country' => 'Bangladesh'],
            ['name' => 'Viqarunnisa Noon School and College', 'address' => 'Dhaka, Bangladesh', 'country' => 'Bangladesh'],
            ['name' => 'St. Joseph\'s High School', 'address' => 'Dhaka, Bangladesh', 'country' => 'Bangladesh'],
        ];

        DB::table('schools')->insert($schools);
    }
}
