<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aspek extends Model
{
    public function score()
    {
        return $this->belongsTo('App\AspekScore', 'id', 'aspek_id');
    }
}
