<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestataire extends Model
{
    public function pay()
    {
        return $this->belongsTo('App\Pays','pay_id');
    }
    public function ville()
    {
        return $this->belongsTo('App\Ville','ville_id');
    }
    public function documentstracteurs(){
        return $this->hasMany('App\Documentstracteur');
    }
    public function vehicules()
    {
        return $this->hasMany('App\Vehicule');
    }

}
