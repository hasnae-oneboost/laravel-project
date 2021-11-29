<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarifsAutoroute extends Model
{
    protected $fillable = ['date_debut','date_fin','categorie_vehicule','peage_depart','peage_arrivee','desciption','montant_ht','tva',
    'montant_ttc','ajoute_par','modifie_par'];    
    
    public function categorievehicule()
    {
    return $this->belongsTo('App\Categoriesvehicule','categorie_vehicule');
    }
    public function pegageautoroute()
    {
    return $this->belongsTo('App\Peagesautoroute','peage_depart');
    }
}
