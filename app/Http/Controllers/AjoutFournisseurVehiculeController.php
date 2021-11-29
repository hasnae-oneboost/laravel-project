<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pays;
use App\Ville;
use App\Acce;
use Auth;

class AjoutFournisseurVehiculeController extends Controller
{
    public function index()
    {
        $classe_referentiel=1;
        $classe_classement=1;
        $classe_contrat=1;
        $classe_four_vehicule=1;

        $pays = Pays::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Ajouter un nouveau fournisseur de véhicule';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.ajout_fournisseur_vehicule',compact('pays','classe_classement','classe_referentiel','classe_contrat','classe_four_vehicule'));
    
    }
}
