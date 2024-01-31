<?php

namespace marketplace\src\Database\Factories;

use App\Models\User;
use marketplace\src\Models\Order;
use marketplace\src\Models\Product;
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
            'price' => 1000,
            'product_id' => function () {
                return Product::factory()->create()->id;
            },
            'quantity' => $this->faker->numberBetween(1, 10),
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'delivery_type' => $this->faker->randomElement([0, 1]),
            'total_price' => 1000,
        ];
    }
}
