<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamillesIntervention extends Model
{
    protected $fillable = ['libelle','code','commentaire','ajoute_par','modifie_par'];  
    
    public function categoriesfamilleinterventions()
    {
        return $this->HasMany('App\Categoriesfamilleintervention');
    }
}
