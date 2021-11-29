<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tva extends Model
{
    protected $fillable = ['libelle','code','type_tva_id','taux_tva','description','ajoute_par','modifie_par'];
    
    public function typetva()
    {
        return $this->belongsTo('App\Tvatype','type_tva_id');
    }

    public function marchandises(){
        return $this->hasMany('App\Marchandise');
    }
}
