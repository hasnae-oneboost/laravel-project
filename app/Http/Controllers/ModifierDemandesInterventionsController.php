<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Vehicule;
use App\Demandesintervention;
use App\Personnel;
use App\{Categoriesdintervention,Gravite,Urgence};

class ModifierDemandesInterventionsController extends Controller
{
    public function index($id)
    {
        $classe_accueil=1;
        $classe_maintenance=1;
        $classe_demandeintervention=1;       

        $vehicules= Vehicule::all();
        $conducteurs= Personnel::where('categorie_id','8')->get();
        $categories= Categoriesdintervention::all();
        $gravites = Gravite::all();
        $urgences = Urgence::all();
        
        $demandes = Demandesintervention::where('id',$id)->firstOrFail();
        
            $acces= new Acce;
            $acces->utilisateur= Auth::user()->name;
            $acces->page= 'Modifier la demande d intervention ID N°'.$id;
            $acces->date=date("Y-m-d h:i:s");
            $acces->save();

        return view('backoffice.modifier_demande_intervention',compact('demandes','conducteurs','vehicules','categories','gravites','urgences','classe_accueil','classe_maintenance','classe_demandeintervention'));
   
    }
}
