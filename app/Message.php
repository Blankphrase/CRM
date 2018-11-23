<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\BelongsToAccountTrait;

class Message extends Model {

    use BelongsToAccountTrait;

    protected $fillable = ['receiver', 'date', 'message','user_id'];
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function messaging()
    {
    	return $this->morphTo();
    }
}