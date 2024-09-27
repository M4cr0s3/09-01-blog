<?php

namespace Database\Factories;

use App\Core\Enums\ModerationEnum;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'image_path' => fake()->imageUrl(300, 300),
            'title' => fake()->sentence(),
            'content' => implode(' ', fake()->sentences),
            'read_time' => fake()->numberBetween(1, 10),
            'moderation' => ModerationEnum::PENDING,
            'moderation_comment' => null,
            'user_id' => 1,
            'category_id' => Category::query()
                ->inRandomOrder()
                ->first()->id,
        ];
    }
}
