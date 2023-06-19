<?php

namespace Database\Factories\Movie;

use Illuminate\Database\Eloquent\Factories\Factory;
use Xylis\FakerCinema\Provider\Movie;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MovieFactory extends Factory
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
            'title' => $faker->unique()->movie(),
            'description' => $faker->paragraph(),
            'year' => $faker->year(1990, 2023),
            'runtime' => $faker->numberBetween(6000, 8000),
        ];
    }
}
