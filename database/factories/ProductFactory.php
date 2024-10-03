<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => 1,
            'enterprise_id' => 1,
            'code' => $this->faker->unique()->ean13(),
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'image' => $this->faker->imageUrl(640, 480, 'products', true),
            'stock' => $this->faker->numberBetween(10, 100),
            'min_stock' => $this->faker->numberBetween(5, 10),
            'max_stock' => $this->faker->numberBetween(50, 200),
            'buy_price' => $this->faker->randomFloat(2, 10, 500),
            'sell_price' => $this->faker->randomFloat(2, 20, 600),
            'ingreso_date' => $this->faker->date(),
        ];
    }
}
