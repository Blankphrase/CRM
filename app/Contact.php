<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model {

    protected $table= 'contacts';
    
    protected $fillable = ['name','account_id'];

    public function account()
    {
    	return $this->belongsTo(Account::class);
    }
    public function opportunities()
    {
    	return $this->hasMany(Opportunity::class);
    }
}