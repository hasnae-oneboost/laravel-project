<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $fillable = ['libelle','direction_id','ajoute_par','modifie_par'];

    public function direction(){
        return $this->belongsTo('App\Direction','direction_id');
    }
    public function services(){
        return $this->hasMany('App\Service');
    }
    
}
