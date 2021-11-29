<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceStation extends Model
{
    protected $fillable = ['libelle','description','ajoute_par','modifie_par'];
    
    public function tarifsgasoils()
    {
    return $this->hasMany('App\Tarifsgasoil');
    }

}
