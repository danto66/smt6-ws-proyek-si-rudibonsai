<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::factory()->count(15)->create();

        foreach ($products as $product) {
            for ($i = 1; $i <= 3; $i++) {
                DB::table('product_images')->insert([
                    'name' => 'p-' . $i . '.jpg',
                    'product_id' => $product->id,
                ]);
            }
        }
    }
}
