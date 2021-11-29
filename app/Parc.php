<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parc extends Model
{
    protected $fillable = ['code','nom','adresse','pay_id','ville_id','code_gestionnaire','nom_gestionnaire','email_gestionnaire'
    ,'commentaire','ajoute_par','modifie_par'];

    public function pay()
    {
        return $this->belongsTo('App\Pays');
    }
    public function ville(){
        return $this->belongsTo('App\Ville');
    }
    public function users()
    {
        return $this->hasMany('App\User');
    }
    public function vehicules()
    {
        return $this->hasMany('App\Vehicule');
    }
}
