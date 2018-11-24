<?php

$factory->define(App\Account::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'api_key' => str_random(30),
    ];
});
