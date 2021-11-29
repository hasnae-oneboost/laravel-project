<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confort extends Model
{
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
