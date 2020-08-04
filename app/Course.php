<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function schemeOfStudies(){
        return $this->belongsToMany('App\Course');
    }
}
