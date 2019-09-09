<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    //
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
