<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Vehicule;
use App\Fournisseur;
use App\Tva;

class AjoutContratAchatController extends Controller
{
    public function index()
    {
        $classe_accueil=1;
        $classe_flotte=1;
        $classe_contrat_achat=1;

        $vehicules= Vehicule::where('prestataire','DSH TRANS')->where('type_acquisition_id',3)->get();
        $fournisseurs= Fournisseur::where('type','Fournisseur de vehicules')->get();
        $tva= Tva::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Ajouter un nouveau contrat d achat';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.ajout_contrat_achat',compact('vehicules','tva','fournisseurs','classe_accueil','classe_flotte','classe_contrat_achat'));
   
    }

}
