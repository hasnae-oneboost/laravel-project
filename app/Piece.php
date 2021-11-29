<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    public function famille()
    {
        return $this->belongsTo('App\Famillespiece','famille_id');
    }
    public function categorie()
    {
        return $this->belongsTo('App\Categoriespiece','categorie_id');
    }
    public function marque()
    {
        return $this->belongsTo('App\Marquespiece','marque_id');
    }
    public function unite()
    {
        return $this->belongsTo('App\Unite','unite_id');
    }
}
