<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            //
            'name' => $this->faker->firstName(),
            'photo' => 'photos/Products/Product.jpg',
            'description' => $this->faker->realText(200, 2),
            'stock' => $this->faker->numberBetween(1, 20),
            'price'=> $this->faker->numberBetween(2,5),
            'category_id'=>$this->faker->numberBetween(1,6),
        ];
    }
}
