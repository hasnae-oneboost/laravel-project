<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypesSanction extends Model
{
    protected $fillable = ['libelle','description','ajoute_par','modifie_par'];    
}
