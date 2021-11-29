<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesPiece extends Model
{
    public function famille()
    {
        return $this->belongsTo('App\Famillespiece','famille_id');
    }
}
