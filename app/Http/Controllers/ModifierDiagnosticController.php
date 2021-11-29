<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Vehicule;
use App\Pays;
use App\Personnel;
use App\{Categoriesdintervention,Famillespiece,Categoriespiece,Naturespiece};
use App\Demandesintervention;
use App\Diagnostic;

class ModifierDiagnosticController extends Controller
{
    public function index($id)
    {
        $classe_accueil=1;
        $classe_maintenance=1;
        $classe_diagnostic=1;       

        $vehicules= Vehicule::all();
        $conducteurs= Personnel::where('categorie_id','8')->get();
        $demandes = Demandesintervention::all();
        $familles = Famillespiece::all();
        $categoriespieces = Categoriespiece::all();
        $pieces = Naturespiece::all();

        $diagnostics = Diagnostic::where('id',$id)->firstOrFail();
        
            $acces= new Acce;
            $acces->utilisateur= Auth::user()->name;
            $acces->page= 'Modifier diagnostic ID N°'.$id;
            $acces->date=date("Y-m-d h:i:s");
            $acces->save();

        return view('backoffice.modifier_diagnostic',compact('diagnostics','pieces','categoriespieces','familles','conducteurs','demandes','vehicules','categories','gravites','urgences','classe_accueil','classe_maintenance','classe_diagnostic'));
   
    }
}
