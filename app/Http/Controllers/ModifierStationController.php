<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pays;
use App\Ville;
use App\Acce;
use Auth;
use App\Fournisseur;

class ModifierStationController extends Controller
{
    public function index($id)
    {
        $classe_referentiel=1;
        $classe_consommation=1;
        $classe_con_carburant=1;
        $classe_station=1;
        $pays = Pays::all();

        $fournisseurs = Fournisseur::where('id',$id)->firstOrFail();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Modifier station: '.$fournisseurs->libelle;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
       
        return view('backoffice.modifier_station',compact('fournisseurs','pays','classe_station','classe_referentiel','classe_consommation','classe_con_carburant'));
    
    }
}
