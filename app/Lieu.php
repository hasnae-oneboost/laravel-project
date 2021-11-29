<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lieu extends Model
{
    protected $fillable = ['pay_id','ville_id','type','ajoute_par','modifie_par'];    
    
    public function pay()
    {
        return $this->belongsTo('App\Pays');
    }
    public function ville(){
        return $this->belongsTo('App\Ville');
    }
    
}
