<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Problem;
use App\Lecture;
use App\Unite;

class Topic extends Model
{
    protected $table = 'topics';
    protected $fillable = array('name');
    public function problems(){
        return $this->hasMany('App\Problem');
    }
    public function lecture(){
        return $this->belongsTo('App\Lecture');
    }
    public function unite(){
        return $this->belongsTo('App\Unite');
    }
}
