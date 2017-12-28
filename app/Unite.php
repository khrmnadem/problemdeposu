<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Problem;
use App\Lecture;
use App\Topic;

class Unite extends Model
{
    protected $table = 'unites';
    protected $fillable = array('name');
    public function problems(){
        return $this->hasMany('App\Problem');
    }
    public function lecture(){
        return $this->belongsTo('App\Lecture');
    }
    public function topics(){
        return $this->hasMany('App\Topic');
    }
}
