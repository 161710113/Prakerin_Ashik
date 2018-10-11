<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = 'mobils';
    protected $fillable = array('nama_mobil', 'transmisi','bahan_bakar','kilometer','kapasitas_mesin',
                                    'warna','harga','no_hp','deskripsi','id_merk','id_tipe','id_lokasi','id_user');
    public $timestamp = true;
    public function Foto() {
        return $this->hasMany('App\Foto', 'id_mobil');
    }
    public function Merk() {
        return $this->belongsTo('App\Merk', 'id_merk');
    }
    public function Tipe() {
        return $this->belongsTo('App\Tipe', 'id_tipe');
    }
    public function Lokasi() {
        return $this->belongsTo('App\Lokasi', 'id_lokasi');
    }
    public function User() {
        return $this->belongsTo('App\User', 'id_user');
    }
}
