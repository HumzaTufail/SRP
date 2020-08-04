<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchemeOfStudy extends Model
{
    public function courses(){
        return $this->belongsToMany('App\SchemeOfStudy');
    }
}
