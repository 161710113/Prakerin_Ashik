<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'beritas';
    protected $fillable = ['judul', 'isi','foto'];
    public $timestamp = true;
}
