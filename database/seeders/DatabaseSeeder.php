<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\UserProfileSeeder;
use Database\Seeders\AdminProfileSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // seeder tabel alamat (provinsi, kabupaten, kecamatan)
        $path = resource_path('database-seeder/alamat_indonesia.sql');
        DB::unprepared(file_get_contents($path));
        $this->command->info('Address table seeded');

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            AdminProfileSeeder::class,
            UserProfileSeeder::class,
        ]);
    }
}
