<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caisse extends Model
{
    protected $fillable = ['code','libelle','solde_initial','numero_compte_comptable','montant_min','dernier_numero_operation','description','observation','solde','ajoute_par','modifie_par'];
    
}
