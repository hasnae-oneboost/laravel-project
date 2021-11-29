<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pays;
use App\Ville;
use App\Acce;
use Auth;

class AjoutFournisseurCarburantController extends Controller
{
    public function index()
    {
        $classe_referentiel=1;
        $classe_consommation=1;
        $classe_con_carburant=1;
        $classe_four_carb=1;
        $pays = Pays::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Ajouter un nouveau fournisseur de carburant';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.ajout_fournisseur_carburant',compact('pays','classe_four_carb','classe_referentiel','classe_consommation','classe_con_carburant'));
    
    }
}
