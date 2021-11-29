<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['libelle','departement_id','ajoute_par','modifie_par'];

    public function departement(){
        
        return $this->belongsTo('App\Departement','departement_id');
    }
}
