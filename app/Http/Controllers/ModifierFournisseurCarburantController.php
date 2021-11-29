<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pays;
use App\Ville;
use App\Acce;
use Auth;
use App\Fournisseur;

class ModifierFournisseurCarburantController extends Controller
{
    public function index($id)
    {
        $classe_referentiel=1;
        $classe_consommation=1;
        $classe_con_carburant=1;
        $classe_four_carb=1;
        $pays = Pays::all();

        $fournisseurs = Fournisseur::where('id',$id)->firstOrFail();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Modifier fournisseur de carburant: '.$fournisseurs->libelle;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
       
        return view('backoffice.modifier_fournisseur_carburant',compact('fournisseurs','pays','classe_four_carb','classe_referentiel','classe_consommation','classe_con_carburant'));
    
    }
}
