<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipementsVehicule extends Model
{
    public function typeequipementvehicule()
    {
        return $this->belongsTo('App\Typeequipementvehicule','type_id');
    }
    public function equipementvehicule()
    {
        return $this->belongsTo('App\Equipementvehicule','equipement_id');
    }
    public function vehicule()
    {
        return $this->belongsTo('App\Vehicule','vehicule_id');
    }
    public function fournisseur()
    {
        return $this->belongsTo('App\Fournisseur','fournisseur_id');
    }

}
