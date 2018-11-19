<?php

$factory->define(Message::class, function ($faker) {
    return [
        'date'=>$faker->date,
        'message'=>$faker->paragraphs(rand(1,2), true),
        'receiver'=>$faker->name,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'user_type' => function (array $message) {
            return App\User::find($message['user_id'])->type;
        }
    ];
});