<?php

$factory->define(App\Message::class, function (Faker\Generator $faker) {
    return [
        'account_id' => factory(App\Account::class)->create()->id,
        'date'=>$faker->date,
        'message'=>$faker->paragraphs(rand(1,2), true),
        'receiver'=>$faker->name,
    ];
});