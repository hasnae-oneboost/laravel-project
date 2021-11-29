<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesFamilleIntervention extends Model
{
    protected $fillable = ['libelle','code','famille_id','commentaire','ajoute_par','modifie_par'];
    
    public function famillesintervention()
    {
        return $this->belongsTo('App\Famillesintervention','famille_id');
    }
    public function souscategoriefamilleinterventions()
    {
        return $this->HasMany('App\Souscategoriefamilleintervention');
    }
}
