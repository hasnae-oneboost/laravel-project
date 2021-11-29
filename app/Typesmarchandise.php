<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypesMarchandise extends Model
{
    protected $fillable = ['libelle','description','ajoute_par','modifie_par'];
    
    public function marchandises(){
        return $this->hasMany('App\Marchandise');
    }
}
