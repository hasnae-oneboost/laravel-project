<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypesDetailsAccident extends Model
{
    protected $fillable = ['libelle','ajoute_par','modifie_par'];
}
