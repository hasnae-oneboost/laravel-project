<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorieTrajet extends Model
{
    protected $fillable = ['libelle','ajoute_par','modifie_par'];

    public function detailstrajets(){
        return $this->hasMany('App\Detailstrajet');
    }
    
}
