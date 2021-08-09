<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ketidakhadiran extends Model
{
    public function score()
    {
        return $this->belongsTo('App\KetidakhadiranScore', 'id', 'ketidakhadiran_id');
    }
}
