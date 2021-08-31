<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
