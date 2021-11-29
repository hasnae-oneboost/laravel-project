<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DemandesIntervention extends Model
{
    public function vehicule(){
        return $this->belongsTo('App\Vehicule','vehicule_id');
    }
    public function demandeur(){
        return $this->belongsTo('App\Personnel','demandeur_id');
    }
    public function categorie(){
        return $this->belongsTo('App\Categoriesdintervention','categorie_id');
    }
    public function gravit(){
        return $this->belongsTo('App\Gravite','gravite_id');
    }
    public function urgenc(){
        return $this->belongsTo('App\Urgence','urgence_id');
    }
}
