<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function clien()
    {
        return $this->belongsTo('App\Client','client');
    }
    public function fournisseu()
    {
        return $this->belongsTo('App\Fournisseur','fournisseur');
    }
}
