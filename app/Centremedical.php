<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentreMedical extends Model
{
    protected $fillable = ['libelle','adresse','description','ajoute_par','modifie_par'];
}
