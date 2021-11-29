<?php

namespace App;

use Illuminate\Support\Facades\Config;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Larashop\Notifications\LarashopAdminResetPassword as ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    use EntrustUserTrait;

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name', 
    'email', 
    'password',
    'prenom',
    'matricule',
    'login',
    'parc_id',
    'client_id',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    'password', 
    'remember_token',
    ];   
    public function getAvatarUrl()
    {
        return "https://www.gravatar.com/avatar/" . md5($this->email) . "?d=mm";
    }
   
    public function client()
    {
        return $this->belongsTo('App\Client','client_id');
    }
    public function parc()
    {
        return $this->belongsTo('App\Parc','parc_id');
    }

}