<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarifsGasoil extends Model
{
    protected $fillable = ['date_debut','date_fin','service_station','station','montan_ht','montan_tva',
    'montan_ttc','ajoute_par','modifie_par'];    
    
    public function servicestation()
    {
    return $this->belongsTo('App\Servicestation','service_station');
    }
}
           
          