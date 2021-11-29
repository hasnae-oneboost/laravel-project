<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pays;
use App\Ville;
use App\Acce;
use Auth;

class AjoutStationController extends Controller
{
    public function index()
    {
        $classe_referentiel=1;
        $classe_consommation=1;
        $classe_con_carburant=1;
        $classe_station=1;
        $pays = Pays::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Ajouter une nouvelle station';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();


        return view('backoffice.ajout_station',compact('pays','classe_station','classe_referentiel','classe_consommation','classe_con_carburant'));
    
    }
}
