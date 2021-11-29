<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
   protected $fillable = ['raison_sociale','logo','IF','RC','adresse','telephone','fixe','type','capital','cnss','TP','swift','site','ice','email'];

   

}
