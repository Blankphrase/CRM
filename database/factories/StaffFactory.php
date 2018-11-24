<?php

$factory->define(App\Staff::class, function (Faker\Generator $faker) {
    return [
        'staff'     => $faker->staff,
        'account_id' => factory(App\Account::class)->create()->id,
        'user_id' => factory(App\User::class)->create()->id,
    ];
});