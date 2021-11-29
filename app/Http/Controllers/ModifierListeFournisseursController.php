<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pays;
use App\Ville;
use App\Acce;
use Auth;
use App\Fournisseur;
use App\Echeance;


class ModifierListeFournisseursController extends Controller
{
    public function index($id)
    {
        $classe_referentiel=1;
        $classe_consommation=1;
        $classe_fournisseurs=1;

        $pays = Pays::all();

        $fournisseurs = Fournisseur::where('id',$id)->firstOrFail();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Modifier fournisseur: '.$fournisseurs->libelle;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();  

        $types= Fournisseur::distinct()->get(['type']);
        
        $typeFournisseur = Fournisseur::where('type','Fournisseur de vehicules')->get();

        $values = explode(", ", $fournisseurs->activite);
        
        $echeances = Echeance::all();
        

        return view('backoffice.liste_fournisseurs_modifier',compact('typeFournisseur','echeances','types','pays','values','fournisseurs','classe_consommation','classe_referentiel','classe_fournisseurs'));
    
    }
}
