<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypesSemiremorque extends Model
{
    public function vehicules()
    {
        return $this->hasMany('App\Vehicule');
    }
}
