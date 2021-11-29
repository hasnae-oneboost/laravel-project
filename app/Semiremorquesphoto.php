<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SemiRemorquesPhoto extends Model
{
    public function semiremorques()
    {
        return $this->hasMany('App\Vehicule','semiremorque_id');
    }
}
