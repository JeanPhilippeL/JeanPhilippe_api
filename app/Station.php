<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    public function measure()
    {
        return $this->hasMany('App\Measure');
    }
}
