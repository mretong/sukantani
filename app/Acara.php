<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    protected $table 	= 'acara';
    protected $id		= 'id';
    protected $fillable = ['nama', 'limit'];
    public $timestamps	= false;



    public function getName($id) {

    	$acara = Acara::where('id', $id)->first();
    	return $acara->nama;
    }

    public function peserta() {
        return $this->belongsToMany('App\Peserta');
    }
    
}
