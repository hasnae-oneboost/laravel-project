<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypesPromotion extends Model
{
    protected $fillable = ['libelle','montant','description','ajoute_par','modifie_par'];
    
}
