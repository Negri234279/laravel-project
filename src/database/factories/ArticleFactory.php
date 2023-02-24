<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'body' => fake()->text(),
            'sport' => fake()->randomElement(['TRAIL', 'TREKKING', 'BIKING', 'RUNNING']),
        ];
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'article_user');
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
}
