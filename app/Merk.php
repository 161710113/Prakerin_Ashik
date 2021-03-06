<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    //
    protected $table = 'merks';
    protected $fillable =['nama_merk'];
    public $timestamp = true;

    public function Mobil() {
        return $this->hasMany('App\Mobil', 'id_merk');
    }
}
