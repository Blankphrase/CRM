<?php 

namespace App\Http\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array.
     *
     * @param  \App\User  $user
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id'         => $user->id,
            'name' => $user->name,
            'email'      => $user->email,
            'account_id' => $user->account_id,
            'created_at' => $acount->created_at->toDateTimeString(),
            'updated_at' => $acount->updated_at->toDateTimeString()
        ];
    }

    /**
     * Include account.
     *
     * @param  \App\User  $user
     * @return League\Fractal\ItemResource
     */
    public function includeLevels(User $user)
    {
        return $this->item($user->account, new AccountTransformer);
    }
}