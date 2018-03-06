<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{

    public function station()
    {
        return $this->belongsTo('App\Station');
    }

    protected $fillable = ['value', 'description'];
    //protected $table = 'MeasureTable';


}
