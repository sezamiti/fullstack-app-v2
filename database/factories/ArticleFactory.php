<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Article::class;

    public function definition()
    {

        $title = $this->faker->sentence(6, true);
        $slug =  Str::substr(Str::lower(preg_replace('/\s+/', '-', $title )), 0, -1);


        return [
            'title' => $title,
            'body' => $this->faker->paragraph(100, true),
            'slug' => $slug,
//            'img' => 'https://via.placeholder.com/600/5F113B/FFFFFF/?text=LARAVEL:8.*',
            'img' => 'https://fakeimg.pl/600x400',
            'created_at' => $this->faker->dateTimeBetween('-1 years'),
            'published_at' => Carbon::now()
        ];
    }
}
