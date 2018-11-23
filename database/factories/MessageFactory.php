<?php

$factory->define(Message::class, function ($faker) {
    return [
        'date'=>$faker->date,
        'message'=>$faker->paragraphs(rand(1,2), true),
        'receiver'=>$faker->name,
        'account_id' => function () {
            return factory(App\Account::class)->create()->id;
        },
        'account_type' => function (array $message) {
            return App\Account::find($message['account_id'])->type;
        }
    ];
});