<?php

$factory->define(App\Contact::class, function (Faker\Generator $faker) {
    return [
        'account_id' => factory(App\Account::class)->create()->id,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' =>$faker->phone,
        'address'=>$faker->address,
        'idnumber'=>str_random(10)
    ];
});