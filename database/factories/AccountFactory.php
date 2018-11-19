<?php

$factory->define(Account::class, function ($faker) {
    return [
        'name' => $faker->name,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'user_type' => function (array $account) {
            return App\User::find($account['user_id'])->type;
        }
    ];
});