<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $table    = 'problems';
    protected $fillable = array('ders','unite','konu','senaryo', 'benzer', 'kaynak', 'malzeme', 'iletisim_kaynak', 'destek', 'keywords', 'resim_yolu', 'onay_say');
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function onays(){
        return $this->hasMany('App\Onay');
    }
    
    public function cats(){
        return $this->belongsToMany('App\Cat');
    }
}
