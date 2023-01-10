<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Comment::class;

    public function definition()
    {


        return [
            'subject' => $this->faker->sentence('3'),
            'body' => $this->faker->paragraph('3', false),
        ];
    }
}
