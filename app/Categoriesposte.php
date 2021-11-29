<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesPoste extends Model
{
    protected $fillable = ['code','libelle','description','ajoute_par','modifie_par'];
}
