<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Problem;
use App\Unite;

class Lecture extends Model
{
    protected $table = 'lectures';
    protected $fillable = array('name');
    public function problems(){
        return $this->hasMany('App\Problem');
    }
    public function unites(){
        return $this->hasMany('App\Unite');
    }
}
