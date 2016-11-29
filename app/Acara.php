<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    protected $table 	= 'acara';
    protected $id		= 'id';
    protected $fillable = ['nama', 'limit'];
    public $timestamps	= false;

    public function peserta() {
    	return $this->belongsToMany('App\Peserta');
    }
    
}
