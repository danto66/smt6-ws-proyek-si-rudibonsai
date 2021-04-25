<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_profiles')->insert([
            'fullname' => 'suisei',
            'phone' => '098709870987',
            'address_detail' => 'address detail',
            'provinsi_id' => '11',
            'kabupaten_id' => '1101',
            'kecamatan_id' => '1101010',
            'user_id' => 3,
        ]);
    }
}
