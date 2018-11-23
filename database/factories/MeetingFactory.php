<?php

$factory->define(Meeting::class, function ($faker) {
    return [
        'date'=>$faker->date,
        'location'=>$faker->name,
        'status'=>str_random(10),
        'account_id' => function () {
            return factory(App\Account::class)->create()->id;
        },
        'account_type' => function (array $meeting) {
            return App\Account::find($meeting['account_id'])->type;
        }
    ];
});