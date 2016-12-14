<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontinjen extends Model
{
    protected $table 	= 'kontinjens';
    protected $id		= 'id';
    protected $fillable = ['nama', 'role', 'nokp', 'notel', 'jantina', 'agensi_id'];

    public $timestamps 	= false;

    public function agensi() {
    	return $this->belongsTo('App\Agensi');
    }

    public function setNamaAttribute($value) {

    	$this->attributes['nama'] = strtoupper(strtolower($value));
    }
}
