<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelulusan extends Model
{
    protected $fillable = [
        'student_id',
        'uraian',
        'ijazah',
        'skhun',
        'shuambn',
    ];

    public function student()
    {
        return $this->belongsTo('App\Student', 'student_id', 'id');
    }
}
