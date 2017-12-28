<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lecture;
use App\Unite;
use App\OgretmenRol;
use App\Topic;

class Problem extends Model
{
    protected $table = 'problems';
    protected $fillable = array('ders','unite','konu','senaryo_baslik', 'senaryo_icerik', 'benzer', 'bilgi_kaynak', 'bilissel_araclar', 'iletisim_isbirligi_araclar', 'destek_kanal', 'resim_yolu', 'keywords');
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function onays(){
        return $this->hasMany('App\Onay');
    }

    public function lecture(){
        return $this->belongsTo('App\Lecture');
    }

    public function unite(){
        return $this->belongsTo('App\Unite');
    }

    public function topic(){
        return $this->belongsTo('App\Topic');
    }

    public function ogretmen_rols(){
        return $this->belongsTo('App\OgretmenRols');
    }
}
