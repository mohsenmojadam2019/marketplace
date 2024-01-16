<?php

namespace marketplace\src\Database\Factories;

use Illuminate\Support\Str;
use marketplace\src\Models\Order;
use Webkul\CartRule\Models\CartRule;
use Webkul\CartRule\Models\CartRuleCoupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

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
            'product_id' => function () {
                return \marketplace\src\Models\Product::factory()->create()->id;
            },
            'quantity' => $this->faker->numberBetween(1, 10),
            'shipping_address' => $this->faker->address,
            'user_id' => function () {
                return \app\Models\User::factory()->create()->id;
            },
        ];
    }
}
