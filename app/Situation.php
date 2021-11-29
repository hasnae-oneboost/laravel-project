<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Situation extends Model
{
    protected $fillable = ['libelle','description','ajoute_par','modifie_par'];    
}
