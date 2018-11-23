<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\BelongsToAccountTrait;

class Meeting extends Model {

    use BelongsToAccountTrait;

    protected $fillable = ['date', 'location', 'status', 'user_id'];
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function contacts()
    {
    	return $this->belongsToMany(Contact::class);
    }
}