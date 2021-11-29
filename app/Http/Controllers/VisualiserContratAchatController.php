<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Contratachat;
use App\{Vehicule,Fournisseur,Tva};

class VisualiserContratAchatController extends Controller
{
    public function index($id)
    {
        $classe_accueil=1;
        $classe_flotte=1;
        $classe_contrat_achat=1;
       
        $contrats= Contratachat::where('id',$id)->firstOrFail();

        $vehicules= Vehicule::where('prestataire','DSH TRANS')->where('type_acquisition_id',3)->get();        
        $fournisseurs= Fournisseur::where('type','Fournisseur de vehicules')->get();
        $tva= Tva::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Visualiser contrat d achat N°: '.$contrats->code;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return view('backoffice.visualiser_contrat_achat',compact('contrats','tva','fournisseurs','vehicules','classe_accueil','classe_flotte','classe_contrat_achat'));
        
    }
}
