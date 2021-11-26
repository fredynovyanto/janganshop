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
            'category_id' => rand(1,7),
            'name' => $this->faker->name(),
            'small_description' => $this->faker->text(20),
            'description' => $this->faker->sentence(),
            'original_price' => rand(1000, 100000),
            'selling_price' => rand(1000, 100000),
            'image' => 'product_images/default.jpg',
            'qty' => rand(10, 50),
            'tax' => rand(10, 50),
            'status' => rand(0, 1),
            'trending' => rand(0, 1),
            'meta_title' => $this->faker->name(),
            'meta_keyword' => $this->faker->name(),
            'meta_description' => $this->faker->sentence(),
        ];
    }
}
