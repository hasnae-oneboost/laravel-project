<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AutorisationsAbsence extends Model
{
    public function typesabsence()
    {
        return $this->belongsTo('App\Typesabsence','type_id');
    }
    public function personnel()
    {
        return $this->belongsTo('App\Personnel','personnel_id');
    }

}
