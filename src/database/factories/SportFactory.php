<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sport>
 */
class SportFactory extends Factory
{
    private $sportNames = [
        'Surfing',
        'Bodyboarding',
        'Wakeboarding',
        'Kitesurfing',
        'Mountain Bike',
        'Longboard',
        'Skateboarding',
        'Windsurfing',
        'Bodysurfing',
        'BMX',
        'Base jumping',
        'Ski',
        'Skimboarding',
        'Snowboarding',
        'Sandboarding',
        'Soccer',
        'Volleyball',
        'Football',
        'Hockey',
        'Basketball',
        'Rugby',
        'Running',
        'Jiu Jitsu',
        'Mixed Martial Arts',
        'Karate',
        'Judo',
        'Wrestling',
        'Kickboxing',
        'Muay-Thai',
        'Rapel',
        'Formula One',
        'Formula Indy',
        'Nascar',
        'Rafting',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = Arr::random($this->sportNames);
        $key = array_search($name, $this->sportNames);
        array_splice($this->sportNames, $key, 1);

        return [
            'name' => $name,
            'description' => fake()->sentence(),
        ];
    }
}
