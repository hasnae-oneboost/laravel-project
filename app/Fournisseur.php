<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $fillable = ['code','libelle','adresse','pay_id','ville_id','rc','patente','if','compte_bancaire','capital'
    ,'cnss','fixe1','fixe2','fixe3','fixe4','gsm1','gsm2','fax','gerant','responsable','site_web','type','commentaire','echeance','ajoute_par','modifie_par'];

    public function pay()
    {
        return $this->belongsTo('App\Pays');
    }
    public function ville(){
        return $this->belongsTo('App\Ville');
    }
    public function echeanc()
    {
        return $this->belongsTo('App\Echeance','echeance');
    }
    public function appels()
    {
        return $this->hasMany('App\Appel');
    }
    public function contacts()
    {
        return $this->hasMany('App\Contacts');
    }
    public function rendezvous()
    {
        return $this->hasMany('App\Rendezvou');
    }
    public function contratsleasing()
    {
        return $this->hasMany('App\Contratsleasing');
    }
    public function contratachat()
    {
        return $this->hasMany('App\Contratachat');
    }
}
