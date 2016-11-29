<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyertaan extends Model
{
    protected $table 	= 'penyertaan';
    protected $id		= 'id';
    protected $fillable	= ['acara_id', 'peserta_id'];
    public $timestamps	= false;

    public function peserta() {
    	return $this->belongsToMany('App\Peserta', 'peserta_acara', 'acara_id', 'peserta_id');
    }
}
