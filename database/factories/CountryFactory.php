<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    protected $model = Country::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->country,
            'code' => $this->faker->unique()->countryCode,
            'flag' => $this->faker->imageUrl(200, 100),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Country $country) {
            $cities = City::factory()->count(3)->make();
            $country->cities()->saveMany($cities);
        });
    }
}

class CityFactory extends Factory
{
    protected $model = City::class;

    public function definition()
    {
        return [
            'name' => $this->faker->city,
            'code' => $this->faker->unique()->numerify('###'),
        ];
    }
}
