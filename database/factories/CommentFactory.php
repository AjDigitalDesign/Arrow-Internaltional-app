<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'the_comment' => $this->faker->paragraph(1),
            'post_id' => Post::all()->random(1)->first()->id,
            'user_id' => User::all()->random(1)->first()->id
        ];
    }
}
