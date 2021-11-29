<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    protected $fillable = ['libelle','banque_id','agence_id','date_création','rib','solde_initial',
    'description','ajoute_par','modifie_par'];

    public function banque(){
        return $this->belongsTo('App\Banque');
    }
    public function agence(){
        return $this->belongsTo('App\Agence');
    }
}
