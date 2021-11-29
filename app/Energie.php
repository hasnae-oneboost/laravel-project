<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Energie extends Model
{
    public function modeles()
    {
        return $this->hasMany('App\Modele');
    }
}
