<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function pay()
    {
        return $this->belongsTo('App\Pays','pay_id');
    }
    public function ville()
    {
        return $this->belongsTo('App\Ville','ville_id');
    }
    public function echeanc()
    {
        return $this->belongsTo('App\Echeance','echeance');
    }
    public function appels()
    {
        return $this->hasMany('App\Appel');
    }
    public function contacts()
    {
        return $this->hasMany('App\Contacts');
    }
    public function rendezvous()
    {
        return $this->hasMany('App\Rendezvou');
    }
    public function events()
    {
        return $this->hasMany('App\Event');
    }
    public function users()
    {
        return $this->hasMany('App\User');
    }
    
}
