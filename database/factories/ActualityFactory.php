<?php

use Faker\Generator as Faker;

$factory->define(App\Actuality::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'description' => $faker->paragraph
    ];
});
