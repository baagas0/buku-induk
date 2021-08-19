<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $fillable = [
        'kelompok_id',
        'name',
        'is_sub',
    ];
}
