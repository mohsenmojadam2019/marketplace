<?php

namespace marketplace\src\Database\Factories;

use Illuminate\Support\Str;
use marketplace\src\Models\Category;
use Webkul\CartRule\Models\CartRule;
use Webkul\CartRule\Models\CartRuleCoupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'is_active' => $this->faker->boolean,
            'parent_id' => null,
        ];
    }
}
