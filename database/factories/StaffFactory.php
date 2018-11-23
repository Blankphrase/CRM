<?php

$factory->define(Staff::class, function ($faker) {
    return [
        'staff' => $faker->staff,
        'account_id' => function () {
            return factory(App\Account::class)->create()->id;
        },
        'account_type' => function (array $user) {
            return App\Account::find($user['account_id'])->type;
        },
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'user_type' => function (array $user) {
            return App\User::find($user['user_id'])->type;
        }
    ];
});