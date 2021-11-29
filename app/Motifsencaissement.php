<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotifsEncaissement extends Model
{
    protected $fillable = ['code','libelle','numero_compte_comptable','categorie_motif_id','description','ajoute_par','modifie_par'];
    

    public function Categoriesmotifsencaissement()
    {
        return $this->belongsTo('App\Categoriesmotifsencaissement','categorie_motif_id');
    }
}
