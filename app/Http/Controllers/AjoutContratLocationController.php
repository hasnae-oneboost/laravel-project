<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Vehicule;
use App\Fournisseur;
use App\Tva;

class AjoutContratLocationController extends Controller
{
    public function index()
    {
        $classe_accueil=1;
        $classe_flotte=1;
        $classe_contrat_location=1;

        $vehicules= Vehicule::where('prestataire','DSH TRANS')->where('type_acquisition_id',5)->get();
        $fournisseurs= Fournisseur::where('type','Fournisseur de vehicules')->get();
        $tva= Tva::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Ajouter un nouveau contrat de location';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.ajout_contrat_location',compact('vehicules','tva','fournisseurs','classe_accueil','classe_flotte','classe_contrat_location'));
   
    }
}
