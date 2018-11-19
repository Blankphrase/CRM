<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model {

    protected $fillable = ['date', 'location', 'status', 'user_id'];
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function contacts()
    {
    	return $this->hasMany(Contact::class);
    }
}