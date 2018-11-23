<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name'     => $faker->name,
        'email'    => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'api_token' => str_random(10),
        'account_id' => function () {
            return factory(App\Account::class)->create()->id;
        },
        'account_type' => function (array $user) {
            return App\Account::find($user['account_id'])->type;
        }
    ];
});