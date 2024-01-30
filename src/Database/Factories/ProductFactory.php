<?php

namespace Shab\Marketplace\Database\Factories;

use Illuminate\Support\Str;
use Shab\Marketplace\Models\Product;
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
            'manufacturer' => $this->faker->company,
            'weight' => $this->faker->randomFloat(2, 0.1, 50),
            'dimensions' => $this->faker->randomNumber(2) . 'x' . $this->faker->randomNumber(2) . 'x' . $this->faker->randomNumber(2),
            'category_id' => function () {
                return \Shab\Marketplace\Models\Category::factory()->create()->id;
            },
        ];
    }
}
