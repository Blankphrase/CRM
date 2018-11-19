<?php

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
