<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    protected $fillable = ['numero','libelle','lieu_chargement','lieu_dechargement','douane','distance','description','ajoute_par','modifie_par'];
    
    public function detailstrajets(){
        return $this->hasMany('App\Detailstrajet');
    }
}
