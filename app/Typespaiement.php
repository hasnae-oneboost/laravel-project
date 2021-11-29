<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypesPaiement extends Model
{
    protected $fillable = ['statut','ajoute_par','modifie_par'];    
}
