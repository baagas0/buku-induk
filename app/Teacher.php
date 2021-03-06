<?php

namespace App;

use App\Notifications\Teacher\Auth\ResetPassword;
use App\Notifications\Teacher\Auth\VerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'kelas_id', 'mapel'
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

    public function getLmapelAttribute()
    {
        $mapel = json_decode($this->getRawOriginal('mapel'));

        return $mapel;
    }

    public function getMapelAttribute()
    {
        $mapel = json_decode($this->attributes['mapel']);

        $viewMapel = '';
        foreach ($mapel as $key => $row) {
            $viewMapel .= '<span class="label label-light-success label-pill label-inline mr-2">' . $row . '</span>';
        }

        return $viewMapel;
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas', 'kelas_id', 'id');
    }
}
