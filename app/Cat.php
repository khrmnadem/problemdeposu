<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $table    = 'cats';
    protected $fillable = array('name', 'type');
    
    public function problems(){
        return $this->belongsToMany('App\Problem');
    }
}
