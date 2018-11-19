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
        'email'    => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'api_token' => str_random(10),
    ];
});

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

$factory->define(Opportunity::class, function ($faker) {
    return [
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
