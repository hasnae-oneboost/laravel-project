<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    protected $fillable = ['marque','logo','ajoute_par','modifie_par'];
    
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
