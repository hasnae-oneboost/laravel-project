<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pays;
use App\Acce;
use Auth;
use App\Fournisseur;

class VisualiserFournisseurCartesController extends Controller
{
    public function index($id)
    {
        $classe_referentiel=1;
        $classe_consommation=1;
        $classe_fourn_carte=1;
        $classe_carte_cons=1;
        $pays = Pays::all();

        $fournisseurs = Fournisseur::where('id',$id)->firstOrFail();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Visualiser fournisseur de cartes: '.$fournisseurs->libelle;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
       
        return view('backoffice.visualiser_fournisseur_carte',compact('pays','fournisseurs','classe_referentiel','classe_carte_cons','classe_consommation','classe_fourn_carte'));
    
    }

}
