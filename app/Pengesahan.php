<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengesahan extends Model
{
    protected $table 	= 'pengesahan';
    protected $id		= 'id';
    protected $fillable	= ['agensi_id', 'status'];


    public function agensi() {
    	return $this->belongsTo('App\Agensi');
    }

    // public function setStatusAttribute($value) {
    // 	return $this['status'] = strtoupper($value);
    // }
}
