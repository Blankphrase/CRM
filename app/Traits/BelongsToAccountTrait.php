<?php

namespace App\Traits;

use App\Account;

trait BelongsToAccountTrait {

    public function accounts()
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * @param Account $account
     * @return $this
     */
    public function setAccount(Account $account)
    {
        $this->account()->associate($account);

        return $this;
    }

    /**
     * @return Account|null;
     */
    public function getAccount()
    {
        return $this->getAttribute('account');
    }

}