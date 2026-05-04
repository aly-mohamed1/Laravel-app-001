<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

use function Laravel\Prompts\text;

/**
 * @extends Factory<Post>
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
            'title'=> fake()->text(100),
            'body'=> fake()->text(),
            'user_id' => User::all()->random()->id, // Error in User::inRandomOrder()->first()->id,
            'post_status'=> PostStatus::all()->random()->id,
        ];
    }
}
