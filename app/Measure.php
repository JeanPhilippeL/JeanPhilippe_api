<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    //
    protected $fillable = ['value', 'description', 'station_id'];

    public function station()
    {
        return $this->belongsTo('App\Station');
    }
    //protected $table = 'MeasureTable';
}
