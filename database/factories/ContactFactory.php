<?php

$factory->define(Contact::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' =>$faker->phone,
        'address'=>$faker->address,
        'idnumber'=>str_random(10),
        'account_id' => function () {
            return factory(App\Account::class)->create()->id;
        },
        'account_type' => function (array $contact) {
            return App\Account::find($contact['account_id'])->type;
        }
    ];
});