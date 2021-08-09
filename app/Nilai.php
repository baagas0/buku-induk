<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = [
        'student_id',
        'master_nilai_id',
        'semester_id',
        'n_peng',
        'n_ketr',
        'n_skp',
    ];
}
