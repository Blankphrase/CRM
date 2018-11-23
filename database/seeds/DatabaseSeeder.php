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
        factory(App\Account::class, 50)->create()->each(function ($account) {
            $account->users()->save(factory(App\Account::class)->make());
            $account->messages()->save(factory(App\Message::class)->make());
            $account->meetings()->save(factory(App\Meeting::class)->make());
            $account->contacts()->save(factory(App\Contact::class)->make());
        });
    
        factory(App\Contact::class, 50)->create()->each(function ($contact) {
            $contact->opportunities()->save(factory(App\Opportunity::class)->make());
        });
        
        factory(App\Staff::class, 50)->create();

    }


}
