<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Station;

class Measure extends Model
{


    public function station()
    {
        return $this->belongsTo('App\Station');
    }

    protected $fillable = ['value', 'description'];
    //protected $table = 'MeasureTable';






}
