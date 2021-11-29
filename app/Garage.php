<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    protected $fillable = ['nom','pay_id','ville_id','nom_gerant','responsable','ajoute_par','modifie_par'];
    
    public function pay()
    {
        return $this->belongsTo('App\Pays');
    }
    
    public function ville(){
        return $this->belongsTo('App\Ville');
    }
}
