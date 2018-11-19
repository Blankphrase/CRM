<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model {

	protected $table= 'opportunities';
    protected $fillable = ['name','contact_id','description'];
    public function contact()
    {
    	return $this->belongsTo(Contact::class);
    }
}