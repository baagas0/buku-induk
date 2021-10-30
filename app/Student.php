<?php

namespace App;

use App\Notifications\Student\Auth\ResetPassword;
use App\Notifications\Student\Auth\VerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'kelas_id', 'nis', 'email', 'password',
    ];

    protected $appends = [
        'clone_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    public function getCloneIdAttribute()
    {
        return $this->id;
    }

    public function kelas()
    {
        return $this->hasOne('App\Kelas', 'id', 'kelas_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            Kelulusan::create([
                'student_id' => $model->id,
                'uraian'    => 'Nomor',
                'ijazah'    => null,
                'skhun'     => null,
                'shuambn'   => null,
            ]);

            Kelulusan::create([
                'student_id' => $model->id,
                'uraian'    => 'Penanggalan',
                'ijazah'    => null,
                'skhun'     => null,
                'shuambn'   => null,
            ]);

            Kelulusan::create([
                'student_id' => $model->id,
                'uraian'    => 'Diberikan Tanggal',
                'ijazah'    => null,
                'skhun'     => null,
                'shuambn'   => null,
            ]);
        });
    }
}
