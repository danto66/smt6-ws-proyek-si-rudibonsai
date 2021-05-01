<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = resource_path('database-seeder/db_rajaongkir.sql');
        DB::unprepared(file_get_contents($path));
        $this->command->info('Rajaongkir Address table seeded');
    }
}
