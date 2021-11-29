<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotifsDecaissement extends Model
{
    protected $fillable = ['code','libelle','numero_compte_comptable','categorie_motif_id','description','ajoute_par','modifie_par'];
    
    public function Categoriesmotifsdecaissement()
    {
        return $this->belongsTo('App\Categoriesmotifsdecaissement','categorie_motif_id');
    }
}
