<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = ['name'];

    public function teacher()
    {
        return $this->belongsTo('App\Teacher', 'id', 'kelas_id');
    }
}
