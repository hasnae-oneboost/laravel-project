<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipementProtectionIndividuelle extends Model
{
    protected $fillable = ['libelle','frequence','unite','montant_ht','tva','montant_ttc','description','ajoute_par','modifie_par'];    
    
}
