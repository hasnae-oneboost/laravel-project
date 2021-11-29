<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PiecesJointe extends Model
{
    public function vehicule(){
        return $this->belongsTo('App\Vehicule','vehicule_id');
    }
}
