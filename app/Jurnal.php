<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    protected $fillable = [
        'date',
        'jam_ke',
        'mapel_id',
        'sub_mapel_id',
        'kelas_id',
        'materi',
    ];

    protected $appends = [
        'day',
    ];

    protected $casts = [
        'date'
    ];

    public function getDateAttribute()
    {
        return Carbon::parse($this->getRawOriginal('date'))->locale('id')->isoFormat('D, MMMM YYYY');
    }

    public function getDayAttribute()
    {
        return Carbon::parse($this->getRawOriginal('date'))->locale('id')->isoFormat('dddd');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas', 'kelas_id', 'id');
    }

    public function mapel()
    {
        return $this->belongsTo('App\Mapel', 'mapel_id', 'id');
    }

    public function sub_mapel()
    {
        return $this->belongsTo('App\SubMapel', 'sub_mapel_id', 'id');
    }
}
