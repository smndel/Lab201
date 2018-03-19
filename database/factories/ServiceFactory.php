<?php

use Faker\Generator as Faker;

$factory->define(App\Service::class, function (Faker $faker) {
    return [
        'title' 		=> $faker->sentence(),
        'description' 	=> $faker->paragraph,
        'category' 		=> $faker->randomElement(['accompagnement' ,'formation']),
        'type' 			=> $faker->randomElement(['particulier' ,'professionnel']),
    ];
});
