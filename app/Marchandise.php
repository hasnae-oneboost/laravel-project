<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marchandise extends Model
{
    protected $fillable = ['libelle','type_id','unite_id','tva_id','description','ajoute_par','modifie_par'];    
    
    public function unite(){
        return $this->belongsTo('App\Unite','unite_id');
    }

    public function typesmarchandise(){
        return $this->belongsTo('App\Typesmarchandise','type_id');
    }
    public function tva(){
        return $this->belongsTo('App\Tva','tva_id');
    }
}
