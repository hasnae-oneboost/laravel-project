<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    public function marque()
    {
        return $this->belongsTo('App\Marque','marque_id');
    }
    
    public function categorie(){
        return $this->belongsTo('App\Categoriesvehicule','categorie_id');
    }
    
    public function confort(){
        return $this->belongsTo('App\Confort','confort_id');
    }

    public function energie(){
        return $this->belongsTo('App\Energie','energie_id');
    }
    public function gamme(){
        return $this->belongsTo('App\Gamme','gamme_id');
    }
    public function vehicules()
    {
        return $this->hasMany('App\Vehicule');
    }
}
