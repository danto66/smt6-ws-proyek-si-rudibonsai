<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AddressSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\UserProfileSeeder;
use Database\Seeders\AdminProfileSeeder;
use Database\Seeders\ProductCategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AddressSeeder::class,
            RoleSeeder::class,

            // seeder akun, optional dinonaktifkan saat produksi
            UserSeeder::class,
            AdminProfileSeeder::class,
            UserProfileSeeder::class,

            // seeder tes, akan dinonaktifkan saat produksi
            ProductCategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
