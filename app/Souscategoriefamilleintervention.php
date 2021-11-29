<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SousCategorieFamilleIntervention extends Model
{

    protected $fillable = ['libelle','code','categorie_id','commentaire','ajoute_par','modifie_par'];
    
    public function categoriesintervention()
    {
        return $this->belongsTo('App\Categoriesfamilleintervention','categorie_id');
    }
    
}
