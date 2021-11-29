<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContratAchat extends Model
{
    public function fournisseur(){
        return $this->belongsTo('App\Fournisseur','fournisseur_id');
    }
}
