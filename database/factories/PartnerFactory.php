<?php

use Faker\Generator as Faker;

$factory->define(App\Partner::class, function (Faker $faker) {
    return [
        'name' 		=> $faker->name,
        'bio'		=> $faker->paragraph,
    ];
});
