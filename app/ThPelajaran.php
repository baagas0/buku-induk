<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThPelajaran extends Model
{
    protected $fillable = ['th_mulai', 'th_selesai'];
    
    public static function search($year){
        $th_mulai   = substr($year, 0, 4);
        $th_selesai = substr($year, -4);

        return ThPelajaran::where([
            'th_mulai'      => $th_mulai,
            'th_selesai'    => $th_selesai,
        ])->first();
    }
}
