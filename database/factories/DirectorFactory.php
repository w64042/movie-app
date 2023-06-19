<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Xylis\FakerCinema\Provider\Person;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Director>
 */
class DirectorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create(config('app.locale'));
        $faker->addProvider(new \Xylis\FakerCinema\Provider\Person($faker));
        return [
            'name' => $faker->unique()->director,
        ];
    }
}
