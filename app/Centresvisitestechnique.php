<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentresVisitesTechnique extends Model
{
    protected $fillable = ['code','libelle','adresse','pay_id','ville_id','rc','patente','if','compte_bancaire','capital'
    ,'cnss','fixe1','fixe2','fixe3','fixe4','gsm1','gsm2','fax','gerant','responsable','site_web','commentaire','ajoute_par','modifie_par'];

   
    public function pay()
    {
        return $this->belongsTo('App\Pays');
    }
    public function ville(){
        return $this->belongsTo('App\Ville');
    }
    
}
