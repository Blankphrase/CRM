<?php

namespace App\Http\Transformers;

use League\Fractal\TransformerAbstract;
use App\Account;



class AccountTransformers extends TransformerAbstract
{
    public function transform(Account $account)
    {
        return [
          'id'=> $account->id,
          'name' => $account->name,
          'api_key' =>$account->api_key,
        ];
    }
}