<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocietesAssurance extends Model
{
    protected $fillable = ['matricule','nom','adresse','pay_id','ville_id','rc','patente','if','compte_bancaire','capital'
    ,'fixe1','fixe2','fixe3','fixe4','gsm1','gsm2','gerant','nom_responsable','site_web','commentaire','ajoute_par','modifie_par'];

    public function courtiersassurances(){
        return $this->hasMany('App\CourtiersAssurance');
    }
    public function pay()
    {
        return $this->belongsTo('App\Pays');
    }
    public function ville(){
        return $this->belongsTo('App\Ville');
    }
    
    
    
}