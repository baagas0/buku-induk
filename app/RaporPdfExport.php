<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Jobs\MultiPdfGenerate;
use Auth;

class RaporPdfExport extends Model
{
    protected $fillable = [
        'token',
        'kelas_id',
        'th_pelajaran',
        'status',
        'created_by',
    ];
    protected $appends = [
        'progress',
        'state',
        'htmlStatus',
    ];

    public function getProgressAttribute()
    {
        $on_going_job   = $this->on_going_job;
        $count_job      = $this->count_job;

        if ($this->status == 'pending') {
            return 5;
        }

        if ($on_going_job == 0 || $count_job == 0) {
            return 0;
        }

        return ($on_going_job / $count_job) * 100;
    }

    public function getStateAttribute()
    {
        if ($this->progress <= 30) {
            $return = 'danger';
        } else if ($this->progress <= 60) {
            $return = 'warning';
        } else if ($this->progress <= 80) {
            $return = 'info';
        } else if ($this->progress <= 100) {
            $return = 'success';
        } else {
            $return = 'dark';
        }

        return $return;
    }

    public function gethtmlStatusAttribute()
    {
        $s = $this->status;
        $state = [
            'pending'   => ['title' => 'Pending',       'state' => 'warning'],
            'proccess'  => ['title' => 'On Proccess',   'state' => 'info'],
            'success'   => ['title' => 'Success',       'state' => 'success'],
            'error'     => ['title' => 'error',         'state' => 'danger'],
        ];

        return '<span class="label label-' . $state[$s]['state'] . ' label-dot mr-2"></span><span class="font-weight-bold text-' . $state[$s]['state'] .
            '">' . $state[$s]['title'] . '</span>';
    }

    public function kelas()
    {
        return $this->hasOne('App\Kelas', 'id', 'kelas_id');
    }
    public function user()
    {
        return $this->hasOne('App\Master', 'id', 'created_by');
    }

    public static function getToken()
    {
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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->token = RaporPdfExport::getToken();
            $model->created_by = Auth::guard('master')->user() ? Auth::guard('master')->user()->id : 1;

            $data['token'] = $model->token;
            $data['kelas_id'] = $model->kelas_id;
            $data['th_pelajaran'] = $model->th_pelajaran;

            MultiPdfGenerate::dispatch($data);
        });

        static::created(function ($model) {
            $data['token'] = $model->token;
            $data['kelas_id'] = $model->kelas_id;
            $data['th_pelajaran'] = $model->th_pelajaran;

            MultiPdfGenerate::dispatch($data);
        });
    }
}
