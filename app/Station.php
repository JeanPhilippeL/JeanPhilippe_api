<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{

    public function measure()
    {
        return $this->hasMany('App\Measure');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable = ['name', 'lat', 'long', 'user_id'];


}
