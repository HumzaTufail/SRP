<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PassedCourse extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
