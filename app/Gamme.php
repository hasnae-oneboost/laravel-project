<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gamme extends Model
{
    protected $fillable = ['gamme','marque_id','categorie_id','confort_id','ajoute_par','modifie_par'];  

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
    public function modeles()
    {
        return $this->hasMany('App\Modele');
    }
    public function vehicules()
    {
        return $this->hasMany('App\Vehicule');
    }
}
