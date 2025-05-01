<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>$title=fake()->sentence(),
            'body'=>fake()->paragraph(),
            'category_id'=>Category::all()->random()->id,
            'user_id'=>1,
            'is_published'=>fake()->boolean(),
            'slug'=>Str::slug($title),
        ];
    }
}
