<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intervenant extends Model
{
    protected $fillable = ['matricule','nom','prenom','cin','date_naissance','diplome','fonction','date_entree','ajoute_par','modifie_par'];
}
