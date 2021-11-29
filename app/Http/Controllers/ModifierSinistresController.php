<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Vehicule;
use App\Pays;
use App\Sinistre;

use App\Personnel;

class ModifierSinistresController extends Controller
{
    public function index($id)
    {
        $classe_accueil=1;
        $classe_juridik=1;
        $classe_sinistr=1;
       
        $sinistres= Sinistre::where('id',$id)->firstOrFail();

        $tracteurs= Vehicule::where('type_vehicule','Tracteur')->get();
        $voitures= Vehicule::where('type_vehicule','Voiture de service')->get();
        $semiremorques= Vehicule::where('type_vehicule','Semi-remorque')->get();
        $pays = Pays::all();
        $conducteurs= Personnel::where('categorie_id','8')->get();
        

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Modifier sinistre ID N°: '.$id;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        
        return view('backoffice.modifier_sinistre',compact('conducteurs','sinistres','pays','tracteurs','voitures','semiremorques','classe_sinistr','classe_accueil','classe_juridik'));
    }
}
