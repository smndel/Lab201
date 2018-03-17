<?php

use Faker\Generator as Faker;

$factory->define(App\Applicant::class, function (Faker $faker) {
    return [
        'company'			=> $faker->word,
        'first_name' 		=> $faker->firstName,
        'last_name' 		=> $faker->lastName,
        'phone_number' 		=> $faker->phoneNumber,
        'mail'              => $faker->email,
        'contact'			=> $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null),
        'experience'		=> $faker->numberBetween($min = 0, $max = 50),
        'career'			=> $faker->word,
        'price'				=> $faker->numberBetween($min = 500, $max = 2500),
        'questionnaire_sent'=> $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null),
    ];
});
