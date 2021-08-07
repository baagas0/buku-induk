<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpdScore extends Model
{
    protected $fillable = [
        'upd_id',
        'th_pelajaran_id',
        'student_id',
        'n_smt_1',
        'n_smt_2',
    ];

    public function upd()
    {
        return $this->belongsTo('App\Upd', 'upd_id', 'id');
    }
}
