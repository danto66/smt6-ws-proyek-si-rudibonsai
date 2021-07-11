<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = ['super_admin', 'admin'];
        foreach ($users as $i => $user) {
            DB::table('admin_profiles')->insert([
                'name' => $user,
                'user_id' => $i + 1,
            ]);
        }
    }
}
