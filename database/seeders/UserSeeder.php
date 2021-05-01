<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = ['super_admin', 'admin', 'user'];
        foreach ($users as $i => $user) {
            DB::table('users')->insert([
                'email' => $user . "@mail",
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role_id' => $i + 1,
            ]);
        }
    }
}
