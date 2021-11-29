<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypesInfraction extends Model
{
    protected $fillable = ['libelle','description','ajoute_par','modifie_par'];

    public function infraction(){
        return $this->hasMany('App\Infraction');
    }
}
