<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infraction extends Model
{
    protected $fillable = ['type_infraction_id','libelle','description','ajoute_par','modifie_par'];

    public function typesinfraction()
    {
        return $this->belongsTo('App\Typesinfraction','type_infraction_id');
    }
}
