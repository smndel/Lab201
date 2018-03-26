<?php

use Faker\Generator as Faker;

$factory->define(App\Reference::class, function (Faker $faker) {
    return [
       	'company' 		=> $faker->company,
        'statut' 		=> $faker->randomElement(['publish' ,'unpublish']),
    ];
});
