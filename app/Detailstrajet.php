<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailsTrajet extends Model
{
    protected $fillable = ['trajet_id','date_debut','date_fin','categorie_id','prime_deplacement_1er_conducteur','prime_deplacement_2eme_conducteur',
    'frais_route','consommation','description','ajoute_par','modifie_par'];

    public function trajet(){
        return $this->belongsTo('App\Trajet','trajet_id');
    }
    public function categorietrajet(){
        return $this->belongsTo('App\Categorietrajet','categorie_id');
    }
}
