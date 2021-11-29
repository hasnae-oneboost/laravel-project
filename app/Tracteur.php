<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracteur extends Model
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

    public function parc(){
        return $this->belongsTo('App\Parc','parc_id');
    }
    public function gamme(){
        return $this->belongsTo('App\Gamme','gamme_id');
    }
    public function modele(){
        return $this->belongsTo('App\Modele','modele_id');
    }
    public function typesaquisition(){
        return $this->belongsTo('App\Typesacquisition','type_acquisition_id');
    }
    public function documentstracteurs(){
        return $this->hasMany('App\Documenttracteur');
    }
    public function tracteurphotos(){
        return $this->hasMany('App\Tracteurphoto');
    }
    public function prestatair(){
        return $this->belongsTo('App\Prestataire','prestataire_id');
    }
    public function contratsleasings()
    {
        return $this->hasMany('App\Contratsleasing');
    }
}
