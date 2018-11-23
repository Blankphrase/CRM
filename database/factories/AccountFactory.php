<?php

$factory->define(Account::class, function ($faker) {
    return [
        'name' => $faker->name,
    ];
});