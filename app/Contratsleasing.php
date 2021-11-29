<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContratsLeasing extends Model
{
    public function vehicule()
    {
        return $this->belongsTo('App\Vehicule','vehicule_id');
    }
    public function fournisseur(){
        return $this->belongsTo('App\Fournisseur','fournisseur_id');
    }
}
