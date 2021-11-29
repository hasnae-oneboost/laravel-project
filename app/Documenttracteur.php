<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentTracteur extends Model
{
    public function tracteur(){
        return $this->belongsTo('App\Vehicule','tracteur_id');
    }
}
