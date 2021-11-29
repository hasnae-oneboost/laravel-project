<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipementVehicule extends Model
{
    protected $fillable = ['code','type_id','libelle','description','ajoute_par','modifie_par'];

    public function typeequipementvehicule()
    {
        return $this->belongsTo('App\Typeequipementvehicule','type_id');
    }
}
