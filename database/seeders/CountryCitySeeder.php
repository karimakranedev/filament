<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\City;

class CountryCitySeeder extends Seeder
{
    public function run()
    {
        // Create 10 countries with 3 associated cities each
        Country::factory()->count(10)->create()->each(function ($country) {
            $country->cities()->saveMany(City::factory()->count(20)->create(['country_id' => $country->id]));
        });
    }
}
