<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Contratlocation;
use App\{Vehicule,Fournisseur,Tva};

class VisualiserContratLocationController extends Controller
{
    public function index($id)
    {
        $classe_accueil=1;
        $classe_flotte=1;
        $classe_contrat_location=1;
       
        $contrats= Contratlocation::where('id',$id)->firstOrFail();

        $vehicules= Vehicule::where('prestataire','DSH TRANS')->where('type_acquisition_id',5)->get();        
        $fournisseurs= Fournisseur::where('type','Fournisseur de vehicules')->get();
        $tva= Tva::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Visualiser contrat de location N°: '.$contrats->code;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return view('backoffice.visualiser_contrat_location',compact('contrats','tva','fournisseurs','vehicules','classe_accueil','classe_flotte','classe_contrat_location'));    
    }
}
