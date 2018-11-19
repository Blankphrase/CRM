<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

    protected $fillable = ['receiver', 'date', 'message','user_id'];
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function contacts()
    {
    	return $this->hasMany(Contact::class);
    }
}