<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AspekScore extends Model
{
    protected $fillable = [
        'student_id',
        'aspek_id',
        'th_pelajaran',
        'n_smt_1',
        'n_smt_2',
    ];
    public function student()
    {
        return $this->belongsTo('App\Student', 'aspek_id', 'id');
    }
    public function aspek()
    {
        return $this->belongsTo('App\Aspek', 'aspek_id', 'id');
    }
}
