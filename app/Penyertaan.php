<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyertaan extends Model
{
    protected $table 	= 'acara_peserta';
    protected $id		= 'id';
    protected $fillable	= ['acara_id', 'peserta_id'];
    public $timestamps	= false;

}
