<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesMotifsEncaissement extends Model
{
    protected $fillable = ['libelle','description','ajoute_par','modifie_par'];
    
    
    public function Motifsencaissement()
    {
        return $this->hasMany('App\Motifsencaissement');
    }
}
