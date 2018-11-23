<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\BelongsToAccountTrait;


class Contacts extends Model {

    use BelongsToAccountTrait;
    
    protected $table= 'contacts';
    
    protected $fillable = ['name','account_id'];

    
    public function opportunities()
    {
    	return $this->hasMany(Opportunity::class);
    }

    public function meetings()
    {
    	return $this->hasMany(Meeting::class);
    }

    public function messages()
    {
        return $this->morphMany('App\Message', 'messaging');
    }
}