<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(10),
            'price' => rand(1, 9) * 10000,
            'stock' => rand(1, 10),
            'height' => rand(1, 9),
            'width' => rand(1, 9),
            'weight' => rand(1, 9),
            'length' => rand(1, 9),
            'description' => $this->faker->sentence(),
            'product_category_id' => rand(1, 5),
        ];
    }
}
