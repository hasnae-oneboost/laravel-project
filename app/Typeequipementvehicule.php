<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeEquipementVehicule extends Model
{
    protected $fillable = ['code','libelle','description','ajoute_par','modifie_par'];
    
    public function equipementvehicules(){
        return $this->hasMany('App\Equipementvehicule');
    }
}
