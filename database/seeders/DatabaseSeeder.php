<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'standard',
                'price' => '23000',
                'max_days' => '30',
                'max_users' => '2',
                'is_download' => 1,
                'is_4k' => 1
            ],
            [
                'id' => 2,
                'name' => 'gold',
                'price' => '250000',
                'max_days' => '363',
                'max_users' => '10 ',
                'is_download' => '3',
                'is_4k' => '3'

            ]
        ];
        DB::table('packages')->insert($data);

        $user = [
            [
                'name' => 'Rahayu wandani',
                'email' => 'rahayunch@gmail.com',
                'password' => Hash::make('123123123'),
                'phone_number' => '085777760867',
                'avatar' => null,
                'role' => 'admin'
            ],
            [
                'name' => 'Ridwan wiranata',
                'email' => 'jagokoding15@gmail.com',
                'password' => Hash::make('123123123'),
                'phone_number' => '081277906754',
                'avatar' => null,
                'role' => 'user'
            ]
        ];
        DB::table('users')->insert($user);
    }
}
