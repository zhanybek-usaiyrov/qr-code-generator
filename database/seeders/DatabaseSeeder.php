<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'email' => 'user@gmail.com'
        ]);

        // TODO temporary solution
        if (!DB::table('personal_access_tokens')->first()) {
            DB::table('personal_access_tokens')->insert([
                'tokenable_type' => 'App\Models\User',
                'tokenable_id' => 1,
                'name' => 'token',
                'token' => 'feed3fe320673a9f8d600902f256a52d329505138930c9fd3ce1ea5dc9fd0e28',
                'abilities' => '["*"]',
                'last_used_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
