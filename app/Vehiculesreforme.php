<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehiculesReforme extends Model
{
    public function vehicule(){
        return $this->belongsTo('App\Vehicule','vehicule_id');
    }
    public function reforme(){
        return $this->belongsTo('App\Reforme','reforme_id');
    }
}
