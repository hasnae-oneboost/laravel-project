<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeagesAutoroute extends Model
{
    protected $fillable = ['peage','ajoute_par','modifie_par'];

    public function tarifsautoroutes()
    {
    return $this->hasMany('App\Tarifsautoroute');
    }
}
