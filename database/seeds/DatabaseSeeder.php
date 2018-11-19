<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 50)->create()->each(function ($user) {
            $user->accounts()->save(factory(App\Account::class)->make());
            $user->messages()->save(factory(App\Message::class)->make());
            $user->meetings()->save(factory(App\Meeting::class)->make());
        });
        factory(App\Account::class, 50)->create()->each(function ($account) {
            $account->contacts()->save(factory(App\Contact::class)->make());
        });
        factory(App\Contact::class, 50)->create()->each(function ($contact) {
            $contact->opportunities()->save(factory(App\Opportunity::class)->make());
        });

    }


}
