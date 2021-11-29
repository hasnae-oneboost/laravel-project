<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypesAcquisition extends Model
{
    protected $fillable = ['code','libelle','description','ajoute_par','modifie_par'];
    
    public function vehicules()
    {
        return $this->hasMany('App\Vehicule');
    }
}
