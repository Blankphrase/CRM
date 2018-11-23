<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\BelongsToAccountTrait;

class Staff extends Model
{


    use BelongsToAccountTrait;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'org_id', 'staff'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function messages()
    {
        return $this->morphMany('App\Message', 'messaging');
    }
}
