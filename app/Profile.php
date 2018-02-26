<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    public function user()
    {
        //protected $primaryKey = 'user_id';
        return $this->belongsTo('App\User');
    }
}
