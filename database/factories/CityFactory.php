<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\City;
$fakerUa = Faker\Factory::create('uk_UA');
$factory->define(App\Models\City::class, function (Faker\Generator $faker) use ($fakerUa){
    return [
        'name' => $fakerUa->unique()->city,
    ];
});
