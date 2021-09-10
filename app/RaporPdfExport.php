<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Jobs\MultiPdfGenerate;

class RaporPdfExport extends Model
{
    protected $fillable = [
        'token',
        'kelas_id',
        'th_pelajaran',
        'status',
    ];
    protected $appends = [
        'progress',
        'state',
    ];

    public function getProgressAttribute(){
        $on_going_job   = $this->on_going_job;
        $count_job      = $this->count_job;
        if ($on_going_job== 0 || $count_job== 0) {
            return 0;
        }

        return ($on_going_job / $count_job) * 100;
    }

    public function getStateAttribute(){
        if ($this->progress <= 30) {
            $return = 'danger';
        }else if ($this->progress <= 60) {
            $return = 'warning';
        }else if ($this->progress <= 80) {
            $return = 'info';
        }else if ($this->progress <= 100) {
            $return = 'success';
        }else{
            $return = 'dark';
        }

        return $return;
    }

    public function kelas()
    {
        return $this->hasOne('App\Kelas', 'id', 'kelas_id');
    }

    public static function getToken(){
        $length = 8;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $check_order_id = RaporPdfExport::where('token', '=', $randomString)->count();
        if ($check_order_id == 0) {
            return $randomString;
        } else {
            return Sales::getCodeTransaction();
        }
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($model){
            $model->token = RaporPdfExport::getToken();

            $data['token'] = $model->token;
            $data['kelas_id'] = $model->kelas_id;
            $data['th_pelajaran'] = $model->th_pelajaran;

            MultiPdfGenerate::dispatch($data);
        });
    }
}
