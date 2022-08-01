<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>Str::title(fake()->sentence()),
            'short_content'=>fake()->text(150),
            'content'=>fake()->text(),
            'image'=>fake()->imageUrl(300,300),
            'slug'=>fake()->slug(),
            'is_active'=>fake()->boolean(),
            'sub_categories_id'=>random_int(1, 20),
            'user_id'=>random_int(1, 10),
            'categories_id'=>fake()->numberBetween(1,6)
        ];
    }
}
