<?php

use Faker\Generator as Faker;

$factory->define(App\Contact::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->randomNumber($nbDigits = 7, $strict = true),
        'user_id' => $faker->numberBetween($min = 1, $max = 5)
    ];
});
