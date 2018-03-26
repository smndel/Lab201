<?php

use Faker\Generator as Faker;

$factory->define(App\Accreditation::class, function (Faker $faker) {
    return [
        'title' 		=> $faker->sentence(),
        'statut' 		=> $faker->randomElement(['publish' ,'unpublish']),
    ];
});
