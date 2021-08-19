<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMapel extends Model
{
    protected $fillable= ['mapel_id', 'name'];
    public function mapel()
    {
        return $this->belongsTo('App\Mapel', 'mapel_id', 'id');
    }
}
