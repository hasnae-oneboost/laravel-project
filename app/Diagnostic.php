<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostic extends Model
{
    public function vehicule(){
        return $this->belongsTo('App\Vehicule','vehicule_id');
    }
    public function demandeur(){
        return $this->belongsTo('App\Personnel','demandeur_id');
    }
    public function demande(){
        return $this->belongsTo('App\Demandesintervention','demande_id');
    }
    public function piece(){
        return $this->belongsTo('App\Piece');
    }
    public function categorie(){
        return $this->belongsTo('App\Categoriespiece');
    }
    public function famille(){
        return $this->belongsTo('App\Famillespiece');
    }
}
