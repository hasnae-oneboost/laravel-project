<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    protected $fillable = ['libelle_ville','latitude_ville','longitude_ville','pays_id','ajoute_par','modifie_par'];

    public function pays()
    {
        return $this->belongsTo('App\Pays');
    }
    public function scopePays($query,$pays)
    {
        return $query->where('pays_id', '=', $pays);
    }
    public function banques(){
        return $this->hasMany('App\Banque');
    }
    public function agences(){
        return $this->hasMany('App\Agence');
    }
    public function Societesassurances(){
        return $this->hasMany('App\Societesassurance');
    }
    public function lieus(){
        return $this->hasMany('App\Lieu');
    }
    public function garages(){
        return $this->hasMany('App\Garage');
    }
    public function Centresvisitestechniques(){
        return $this->hasMany('App\Centresvisitestechnique');
    }
    public function fournisseurs(){
        return $this->hasMany('App\Fournisseur');
    }
    public function parcs(){
        return $this->hasMany('App\Parc');
    }
    public function clients()
    {
        return $this->hasMany('App\Client');
    }
    public function transitaires()
    {
        return $this->hasMany('App\Transitaire');
    }
    public function prestataires()
    {
        return $this->hasMany('App\Prestataire');
    }
    public function exportateurimportateurs()
    {
        return $this->hasMany('App\Exportateurimportateur');
    }
    
}

