<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transitaire extends Model
{
    public function pay()
    {
        return $this->belongsTo('App\Pays','pay_id');
    }
    public function ville()
    {
        return $this->belongsTo('App\Ville','ville_id');
    }
    public function echeanc()
    {
        return $this->belongsTo('App\Echeance','echeance');
    }
}
