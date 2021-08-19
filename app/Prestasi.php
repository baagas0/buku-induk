<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
   protected $fillable = [
      'kegiatan_id',
      'student_id',
      'nomor_sertifikat'
   ];
   public function student()
   {
    return $this->belongsTo('App\Student', 'ketidakhadiran_id', 'id');
 }
 public function kegiatan()
 {
  return $this->belongsTo('App\Kegiatan', 'kegiatan_id', 'id');
}
}
