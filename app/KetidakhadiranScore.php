<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KetidakhadiranScore extends Model
{
    protected $fillable = [
        'student_id',
        'ketidakhadiran_id',
        'th_pelajaran',
        'n_smt_1',
        'n_smt_2',
    ];

    public function student()
    {
        return $this->belongsTo('App\Student', 'ketidakhadiran_id', 'id');
    }
    public function ketidakhadiran()
    {
        return $this->belongsTo('App\Ketidakhadiran', 'ketidakhadiran_id', 'id');
    }
}
