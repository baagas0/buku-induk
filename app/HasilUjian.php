<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilUjian extends Model
{
    protected $fillable = [
        'student_id',
        'mapel_id',
        'sub_mapel_id',
        'n_um',
        'n_ijazah',
    ];
}
