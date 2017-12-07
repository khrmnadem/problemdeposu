<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Onay extends Model
{
    protected $table = 'onays';

    public function problem(){
        return $this->belongsTo('App\Problem');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
