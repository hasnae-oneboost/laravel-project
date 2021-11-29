<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    public function pay()
    {
        return $this->belongsTo('App\Pays','pay_id');
    }
    public function ville(){
        return $this->belongsTo('App\Ville','ville_id');
    }
    public function nationalite(){
        return $this->belongsTo('App\Nationalite','nationnalite_id');
    }
    public function categorie(){
        return $this->belongsTo('App\Categoriesposte','categorie_id');
    }
    public function banque(){
        return $this->belongsTo('App\Banque','banque_id');
    }
}

