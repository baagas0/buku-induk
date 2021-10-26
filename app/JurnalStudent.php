<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JurnalStudent extends Model
{
    protected $fillable = [
        'jurnal_id',
        'student_id',
        'keterangan',
    ];

    public function student()
    {
        return $this->belongsTo('App\Student', 'student_id', 'id');
    }
}
