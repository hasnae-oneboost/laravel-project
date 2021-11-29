<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Echeance extends Model
{
   
    public function clients()
    {
        return $this->hasMany('App\Client');
    }
    public function fournisseurs()
    {
        return $this->hasMany('App\Fournisseur');
    }
    public function transitaires()
    {
        return $this->hasMany('App\Transitaire');
    }
    
}
