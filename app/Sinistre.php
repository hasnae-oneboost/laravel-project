<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sinistre extends Model
{
    public function tracteur(){
        return $this->belongsTo('App\Vehicule','tracteur_id');
    }
    public function semiremorque(){
        return $this->belongsTo('App\Vehicule','semiremorque_id');
    }
    public function conducteur1(){
        return $this->belongsTo('App\Personnel','conducteur1_id');
    }
    public function conducteur2(){
        return $this->belongsTo('App\Personnel','conducteur2_id');
    }
    public function pay()
    {
        return $this->belongsTo('App\Pays','pay_id');
    }
    public function ville(){
        return $this->belongsTo('App\Ville','ville_id');
    }
}
