<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    protected $fillable = ['code','banque_id','ville_id','telephone','fax','directeur_agence','libelle','adresse',
    'charge_de_clientele','tel_charge_de_clientele','email_cdc','description'];

    public function banque(){
        return $this->belongsTo('App\Banque');
    }
    public function ville(){
        return $this->belongsTo('App\Ville');
    }
    public function comptes(){
        return $this->hasMany('App\Compte');
    }
}
