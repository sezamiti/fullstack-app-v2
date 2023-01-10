<?php

namespace Database\Factories;

use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class StateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = State::class;

    public function definition()
    {
        return [
            'likes' => $this->faker->numberBetween($min=1, $max=20),
            'views' => $this->faker->numberBetween($min=21, $max=100),
        ];
    }
}
