<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Pays;
use Auth;
use App\Acce;

class AjoutFournisseurCartesController extends Controller
{
    public function index()
    {
        $classe_referentiel=1;
        $classe_consommation=1;
        $classe_fourn_carte=1;
        $classe_carte_cons=1;
        $pays = Pays::all();        
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Ajouter un nouveau fournisseur de cartes';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return view('backoffice.ajout_fournisseur_carte',compact('pays','classe_referentiel','classe_carte_cons','classe_consommation','classe_fourn_carte'));
     }
}
