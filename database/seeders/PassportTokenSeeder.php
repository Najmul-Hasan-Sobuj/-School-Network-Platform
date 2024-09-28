<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\ClientRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PassportTokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed oauth_clients table
        DB::table('oauth_clients')->insert([
            [
                'id' => '9bbd79e4-3b97-4b9d-a36d-7c793db677b3',
                'user_id' => null,
                'name' => 'IMLI Personal Access Client',
                'secret' => 'xjqpe4ZC0R7nG7ttcA2idMvbxWQExUtXZSemlw3F',
                'provider' => null,
                'redirect' => 'http://localhost',
                'personal_access_client' => 1,
                'password_client' => 0,
                'revoked' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '9bbd79e4-942c-4ecf-b1d7-35f0c1dcd3ef',
                'user_id' => null,
                'name' => 'IMLI Password Grant Client',
                'secret' => 'XVL94U4gXh1tIbvHEtcITS5SI6gv9ulU5AA73jw6',
                'provider' => 'users',
                'redirect' => 'http://localhost',
                'personal_access_client' => 0,
                'password_client' => 1,
                'revoked' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seed oauth_personal_access_clients table
        DB::table('oauth_personal_access_clients')->insert([
            [
                'id' => 1,
                'client_id' => '9bbd79e4-3b97-4b9d-a36d-7c793db677b3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
