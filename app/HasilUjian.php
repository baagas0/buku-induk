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

    public function student()
    {
        return $this->belongsTo('App\Student', 'student_id', 'id');
    }

    public function mapel()
    {
        return $this->belongsTo('App\Mapel', 'mapel_id', 'id');
    }

    public function submapel()
    {
        return $this->belongsTo('App\SubMapel', 'sub_mapel_id', 'id');
    }
}
