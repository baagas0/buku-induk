<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterNilai extends Model
{
    protected $fillable = [
        'th_pelajaran',
        'is_sub',
        'mapel_id',
        'sub_mapel_id',
        'kkm',
    ];

    public function mapel()
    {
        return $this->belongsTo('App\Mapel', 'mapel_id', 'id');
    }
    public function submapel()
    {
        return $this->belongsTo('App\SubMapel', 'sub_mapel_id', 'id');
    }
}
