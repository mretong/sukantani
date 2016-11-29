<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agensi extends Model
{
    protected $table 		= 'agensi';
    protected $primaryKey	= 'id';
    public $fillable		= ['nama', 'kod'];
    public $timestamps 		= false;

}
