<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesVehicule extends Model
{
    protected $fillable = ['libelle','ajoute_par','modifie_par'];    
    
    public function tarifsautoroutes()
    {
    return $this->hasMany('App\Tarifsautoroute');
    }
    public function gammes()
    {
        return $this->hasMany('App\Gamme');
    }
    public function modeles()
    {
        return $this->hasMany('App\Modele');
    }
    public function vehicules()
    {
        return $this->hasMany('App\Vehicule');
    }
}
