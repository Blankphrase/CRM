<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name'     => $faker->name,
        'account_id' => factory(App\Account::class)->create()->id,
        'email'    => $faker->unique()->safeEmail,
        'email_verified_at' => \App\Helpers\DateHelper::parseDateTime($faker->dateTimeThisCentury()),
        'password' => app('hash')->make('password'),
        'remember_token' => str_random(10),
    ];
});