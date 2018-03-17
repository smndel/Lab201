<?php

use Faker\Generator as Faker;

$factory->define(App\Partner::class, function (Faker $faker) {
    return [
        'first_name' 		=> $faker->firstName,
        'last_name' 		=> $faker->lastName,
        'bio'				=> $faker->paragraph,
    ];
});
