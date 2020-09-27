<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Estation;

$fakerUa = Faker\Factory::create('uk_UA');
$factory->define(App\Models\Estation::class, function (Faker\Generator $faker) use ($fakerUa){
    $openingTime = $fakerUa->time($format = 'H:i:s');
    return [
        'cityId' => $fakerUa->numberBetween(1,20),
        'streetName' => $fakerUa->streetName,
        'buildingNumber' => rand(1,100),
        'openingTime' => $openingTime,
        'closingTime' => $fakerUa->time($format = 'H:i:s', $openingTime),

    ];
});
