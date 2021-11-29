<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    protected $fillable = ['code_pays','libelle_pays','latitude_pays','longitude_pays','ajoute_par','modifie_par'];

        public function villes()
        {
        return $this->belongsTo('App\Ville');
        }

        public function Societesassurances(){
            return $this->hasMany('App\Societesassurance');
        }
        public function Lieus(){
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
