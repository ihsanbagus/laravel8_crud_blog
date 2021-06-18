<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'post_id' => Post::factory(1)->create()->first(),
            'post_id' => rand(1, Post::count()),
            'user_id' => rand(1, User::count()),
            'comment' => $this->faker->paragraph(3)
        ];
    }
}
