<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert([
            'name' => 'standard',
            'price' => 23000000,
            'max_days' => 30,
            'max_users' => 2,
            'is_download' => 1,
            'is_4k' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ],
    [
            'name' => 'standard',
            'price' => 23000000,
            'max_days' => 30,
            'max_users' => 2,
            'is_download' => 1,
            'is_4k' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
