<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banque extends Model
{
    protected $fillable = ['code','nom','nom_responsable','adresse','logo','ville_id','site_web','description','compte_general','telephone','gsm','fax','rc','patente','if'];
 
    public function ville(){
        return $this->belongsTo('App\Ville');
    }
   
    public function agences(){
        return $this->hasMany('App\Agence');
    }
    public function comptes(){
        return $this->hasMany('App\Compte');
    }
}
