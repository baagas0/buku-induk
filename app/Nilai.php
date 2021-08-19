<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = [
        'student_id',
        'master_nilai_id',
        'semester',
        'n_peng',
        'n_ketr',
        'n_skp',
    ];

    public function student()
    {
        return $this->hasOne('App\Student', 'id', 'student_id');
    }
    public function master()
    {
        return $this->hasOne('App\MasterNilai', 'id', 'master_nilai_id');
    }
}
