<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    //
    protected $table = 'lokasis';
    protected $fillable =['nama_kota'];
    public $timestamp = true;

    public function Mobil() {
        return $this->hasMany('App\Mobil', 'id_lokasi');
    }
}
