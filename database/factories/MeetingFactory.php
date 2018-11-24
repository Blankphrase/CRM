<?php

$factory->define(App\Meeting::class, function (Faker\Generator $faker) {
    return [
        'account_id' => factory(App\Account::class)->create()->id,
        'date'=>$faker->date,
        'location'=>$faker->name,
        'status'=>str_random(10),
    ];
});