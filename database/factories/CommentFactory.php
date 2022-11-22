<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    protected $model = Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        return [
            'body' => [],
            'user_id' => fake()->numberBetween($min = 1, $max = 10),
            'post_id' => fake()->numberBetween($min = 1, $max = 5),
        ];
    }
}
