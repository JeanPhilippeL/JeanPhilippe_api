<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{

    public function measure()
    {
        return $this->hasOne('App\Measure');
    }

    protected $fillable = ['name', 'lat', 'long'];


}
