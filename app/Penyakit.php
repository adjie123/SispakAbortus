<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    protected $fillable = ['kode_penyakit', 'nama_penyakit'];
}
