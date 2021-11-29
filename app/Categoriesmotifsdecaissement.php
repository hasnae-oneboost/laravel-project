<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesMotifsDecaissement extends Model
{
    public function Motifsdecaissement()
    {
        return $this->hasMany('App\Motifsencaissement');
    }
}
