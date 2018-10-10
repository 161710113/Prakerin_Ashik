<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    //
    protected $table = 'tipes';
    protected $fillable =['nama_tipe'];
    public $timestamp = true;
}
