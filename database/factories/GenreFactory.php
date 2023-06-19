<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Xylis\FakerCinema\Provider\Movie;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create(config('app.locale'));
        $faker->addProvider(new \Xylis\FakerCinema\Provider\Movie($faker));
        return [
            'name' => $faker->unique()->movieGenre,
        ];
    }
}
