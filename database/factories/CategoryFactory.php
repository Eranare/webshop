<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            
            
            'photo' => 'photos/Category.jpg',
            
            'description' => $this->faker->realText(200, 2),
            

/*
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('image');
            $table->text('description')->nullable();
            $table->timestamps();
        }); */


       ];
    }
}
