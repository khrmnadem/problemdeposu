<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Problem;
use App\User;

class Onay extends Model
{
    public function problem(){
        return $this->belongsTo('App\Problem');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
