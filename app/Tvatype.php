<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TvaType extends Model
{
    protected $fillable = ['libelle','description','ajoute_par','modifie_par'];
    
    public function tva()
    {
        return $this->hasMany('App\Tva');
    }
}
