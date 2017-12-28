<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Problem;
use App\Lecture;
use App\Unite;

class OgretmenRol extends Model
{
    protected $table = 'ogretmen_rols';
    protected $fillable = array('name');
    public function problems(){
        return $this->hasMany('App\Problem');
    }
}
