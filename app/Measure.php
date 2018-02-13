<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    //
    protected $fillable = ['Value', 'Description'];
    //protected $fillable = ['Value', 'Description','updated_at','created_at'];
    //protected $table = 'MeasureTable';
}
