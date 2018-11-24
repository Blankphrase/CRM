<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name'     => $faker->name,
        'account_id' => factory(App\Account::class)->create()->id,
        'email'    => $faker->unique()->safeEmail,
        'email_verified_at' => \App\Helpers\DateHelper::parseDateTime($faker->dateTimeThisCentury()),
        'password' => app('hash')->make('password'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Account::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'api_key' => str_random(30),
    ];
});


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


$factory->define(App\Opportunity::class, function (Faker\Generator $faker) {
    return [
        'account_id' => factory(App\Account::class)->create()->id,
        'name' => $faker->name,
        'status'=>str_random(10),
        'description'=>$faker->paragraphs(rand(1,2), true),
        'contact_id' => function () {
            return factory(App\Contact::class)->create()->id;
        },
        'contact_type' => function (array $opportunity) {
            return App\Contact::find($opportunity['contact_id'])->type;
        }
    ];
});

$factory->define(App\Meeting::class, function (Faker\Generator $faker) {
    return [
        'account_id' => factory(App\Account::class)->create()->id,
        'date'=>$faker->date,
        'location'=>$faker->name,
        'status'=>str_random(10),
    ];
});

$factory->define(App\Message::class, function (Faker\Generator $faker) {
    return [
        'account_id' => factory(App\Account::class)->create()->id,
        'date'=>$faker->date,
        'message'=>$faker->paragraphs(rand(1,2), true),
        'receiver'=>$faker->name,
    ];
});
