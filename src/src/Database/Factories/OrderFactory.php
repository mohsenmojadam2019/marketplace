<?php

namespace marketplace\src\Database\Factories;

use Illuminate\Support\Str;
use marketplace\src\Models\Order;
use marketplace\src\Enums\OrderEnum;
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
            'user_id' => function () {
                return \app\Models\User::factory()->create()->id;
            },
            'delivery_type' => OrderEnum::randomElement([0, 1]),
            'total_price' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}
