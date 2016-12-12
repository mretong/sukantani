<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table	= 'peserta';
    protected $id		= 'id';
    public $fillable	= ['nama', 'nokp', 'jantina', 'noPekerja', 'tarafJawatan', 'gredJawatan', 'tarikhLantikan', 'vege', 'role', 'noAtlet', 'photo', 'agensi_id'];
    public $timestamps	= false;

    public function agensi() {
    	return $this->belongsTo('App\Agensi');
    }

    public function acara() {
    	return $this->belongsToMany('App\Acara');
    }

}
