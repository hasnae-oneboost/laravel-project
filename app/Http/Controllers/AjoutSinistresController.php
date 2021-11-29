<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Vehicule;
use App\Pays;
use App\Personnel;

class AjoutSinistresController extends Controller
{
    public function index()
    {
        $classe_accueil=1;
        $classe_juridik=1;
        $classe_sinistr=1;


        $tracteurs= Vehicule::where('type_vehicule','Tracteur')->get();
        $voitures= Vehicule::where('type_vehicule','Voiture de service')->get();
        $semiremorques= Vehicule::where('type_vehicule','Semi-remorque')->get();
        $pays = Pays::all();
        $conducteurs= Personnel::where('categorie_id','8')->get();
        
            $acces= new Acce;
            $acces->utilisateur= Auth::user()->name;
            $acces->page= 'Ajouter un nouveau sinistre';
            $acces->date=date("Y-m-d h:i:s");
            $acces->save();

        return view('backoffice.ajout_sinistre',compact('conducteurs','pays','tracteurs','voitures','semiremorques','classe_sinistr','classe_accueil','classe_juridik'));
   
    }
}
