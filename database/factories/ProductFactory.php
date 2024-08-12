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
    public function definition(): array
    {
        return [
            // $table->id();
            // $table->string('product_name', 50);
            // $table->string('image');
            // $table->string('description');
            // $table->double('price', 10, 2);
            // $table->double('sale_price', 10, 2)->nullable();
            // $table->foreignIdFor(Category::class)->constrained();
            // $table->timestamps();
            'product_name' => fake()->name(),
            'image' => "",
            'description' => fake()->paragraph(),
            'price' => fake()->randomDigit(),
            'sale_price' => fake()->randomDigit(),
            'category_id' => fake()->numberBetween(1, 4),
        ];
    }
}
