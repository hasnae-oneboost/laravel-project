<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Pays;
use App\Ville;
use App\Acce;
use Auth;
use App\Fournisseur;
use App\Echeance;

class AjoutListeFournisseursController extends Controller
{
    public function index()
    {
        $classe_referentiel=1;
        $classe_consommation=1;
        $classe_fournisseurs=1;

        $pays = Pays::all();
        $types= Fournisseur::distinct()->get(['type']);
        
        $selected_type= Input::get('type');
        $echeances = Echeance::all();
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Ajouter un nouveau fournisseur';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.liste_fournisseurs_ajouter',compact('echeances','selected_type','types','pays','classe_consommation','classe_fournisseurs'));
    
    }
}
