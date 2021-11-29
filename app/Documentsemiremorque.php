<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentSemiRemorque extends Model
{
    public function semiremorque(){
        return $this->belongsTo('App\Vehicule');
    }
}
