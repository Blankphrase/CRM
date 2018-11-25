<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Account extends Model {

    protected $fillable = ['name', 'api_key'];

    public function user()
    {
    	return $this->hasMany(User::class);
    }

}