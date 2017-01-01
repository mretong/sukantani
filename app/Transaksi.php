<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $id = 'id';
    protected $table = 'transaksi';
    protected $fillable = ['agensi_id', 'peserta_id', 'catatan'];

    public function peserta() {
        return $this->belongsTo('App\Peserta');
    }

    public function agensi() {
    	return $this->belongsTo('App\Agensi');
    }
}
