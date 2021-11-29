<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentsVoitureService extends Model
{
    public function voituresservice(){
        return $this->belongsTo('App\Vehicule','voiture_id');
    }
}
