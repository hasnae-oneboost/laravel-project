<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Vehicule;
use App\Pays;
use App\Personnel;
use App\{Categoriesdintervention,Gravite,Urgence};
use App\Demandesintervention;

class AjoutDemandesInterventionsController extends Controller
{
    public function index()
    {
        $classe_accueil=1;
        $classe_maintenance=1;
        $classe_demandeintervention=1;       

        $vehicules= Vehicule::all();
        $conducteurs= Personnel::where('categorie_id','8')->get();
        $categories= Categoriesdintervention::all();
        $gravites = Gravite::all();
        $urgences = Urgence::all();
        $demandes = Demandesintervention::max('id');
        
        
            $acces= new Acce;
            $acces->utilisateur= Auth::user()->name;
            $acces->page= 'Ajouter une nouvelle d intervention';
            $acces->date=date("Y-m-d h:i:s");
            $acces->save();

        return view('backoffice.ajout_demande_intervention',compact('conducteurs','demandes','vehicules','categories','gravites','urgences','classe_accueil','classe_maintenance','classe_demandeintervention'));
   
    }


}
