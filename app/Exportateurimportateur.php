<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExportateurImportateur extends Model
{
    public function pay()
    {
        return $this->belongsTo('App\Pays','pay_id');
    }
    public function ville()
    {
        return $this->belongsTo('App\Ville','ville_id');
    }
}
