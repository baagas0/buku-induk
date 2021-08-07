<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    public function mapel(){
        return $this->hasMany('App\Mapel','id','mapel_id');
    }
}
