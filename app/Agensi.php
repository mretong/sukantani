<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agensi extends Model
{
    protected $table 		= 'agensi';
    protected $primaryKey	= 'id';
    public $fillable		= ['nama', 'kod', 'kod2'];
    public $timestamps 		= false;

    public function getKod($id) {

    	$agensi = Agensi::where('id', $id)->first();
    	return $agensi->kod;
    }

}
