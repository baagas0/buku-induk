<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterNilai extends Model
{
    protected $fillable = [
        'th_pelajaran_id',
        'is_sub',
        'mapel_id',
        'sub_mapel_id',
        'kkm',
    ];
}
