<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Contratsleasing;
use App\{Vehicule,Fournisseur};

class ModifierContratsLeasingController extends Controller
{
    public function index($id)
    {
        $classe_accueil=1;
        $classe_flotte=1;
        $classe_contrat_leasing=1;
       
        $contrats= Contratsleasing::where('id',$id)->firstOrFail();

        $vehicules= Vehicule::where('prestataire','DSH TRANS')->where('type_acquisition_id',4)->get();        
        $fournisseurs= Fournisseur::where('type','Fournisseur de vehicules')->get();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Modifier contrat de leasing N°: '.$contrats->numero_contrat;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return view('backoffice.modifier_contrat_leasing',compact('contrats','fournisseurs','vehicules','classe_accueil','classe_flotte','classe_contrat_leasing'));
        
    }
}
