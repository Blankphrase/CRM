<?php

namespace App\Traits;

use App\Account;

trait BelongsToAccountTrait {

    public function accounts()
    {
        return $this->belongsTo(Account::class);
    }

}