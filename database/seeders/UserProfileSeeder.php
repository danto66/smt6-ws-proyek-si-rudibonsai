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
            'province_id' => 1,
            'city_id' => 1,
            'subdistrict_id' => 1,
            'user_id' => 3,
        ]);
    }
}
