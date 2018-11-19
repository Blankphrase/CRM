<?php

$factory->define(Meeting::class, function ($faker) {
    return [
        'date'=>$faker->date,
        'location'=>$faker->name,
        'status'=>str_random(10),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'user_type' => function (array $meeting) {
            return App\User::find($meeting['user_id'])->type;
        }
    ];
});