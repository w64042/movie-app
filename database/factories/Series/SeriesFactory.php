<?php

namespace Database\Factories\Series;

use Illuminate\Database\Eloquent\Factories\Factory;
use Xylis\FakerCinema\Provider\TvShow;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SeriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create(config('app.locale'));
        $faker->addProvider(new \Xylis\FakerCinema\Provider\TvShow($faker));
        return [
            'title' => $faker->unique()->tvShow(),
            'description' => $faker->paragraph(),
            'seasons' => $faker->tvShowTotalSeasons(1, 10),
            'episodes' => $faker->tvShowTotalEpisodes(1, 10),
            'director_id' => $faker->numberBetween(1, 10),
            'genre_id' => $faker->numberBetween(1, 10),
        ];
    }
}
