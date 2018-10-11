<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = 'fotos';
    protected $fillable = array('foto', 'id_mobil');
    public $timestamp = true;
    
    public function Mobil() {
        return $this->belongsTo('App\Mobil', 'id_mobil');
  }
}
