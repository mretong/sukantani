<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontinjen extends Model
{
    protected $table 	= 'kontinjens';
    protected $id		= 'id';
    protected $fillable = ['nama', 'ketua', 'timbalan', 'urusetia1', 'urusetia2', 'urusetia3', 'urusetia4', 'urusetia5', 'urusetia6', 'urusetia7', 'urusetia8', 'urusetia9', 'urusetia10', 'agensi_id'];

    public $timestamps 	= false;

    public function agensi() {
    	return $this->belongsTo('App\Agensi');
    }
}
