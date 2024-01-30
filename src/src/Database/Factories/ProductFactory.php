<?php

namespace marketplace\src\Database\Factories;

use Illuminate\Support\Str;
use marketplace\src\Models\Product;
use Webkul\CartRule\Models\CartRule;
use Webkul\CartRule\Models\CartRuleCoupon;
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
    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'description' => $this->faker->sentence,
            'quantity' => $this->faker->numberBetween(1, 100),
            'is_available' => $this->faker->boolean,
            'category_id' => function () {
                return \marketplace\src\Models\Category::factory()->create()->id;
            },
        ];
    }
}
