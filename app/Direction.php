<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    protected $fillable = ['libelle','ajoute_par','modifie_par'];

    public function departements(){
        return $this->hasMany('App\Departement');
    }
    
}
