<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $table    = 'problems';
    protected $fillable = array('senaryo', 'benzer', 'kaynak', 'malzeme', 'iletisim_kaynak', 'destek', 'keywords', 'resim_yolu');
}
