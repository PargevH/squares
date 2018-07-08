<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SquarePosition extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
