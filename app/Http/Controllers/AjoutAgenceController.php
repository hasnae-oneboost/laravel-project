<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banque;
use App\Ville;
use App\Acce;
use Auth;

class AjoutAgenceController extends Controller
{
    
    public function index()
    {
        $classe_referentiel=1;
        $classe_agences=1; 
        $classe_utilisation=1;
        $classe_caisse=1;
        $classe_tresorerie=1;
        //banks
        $banque= Banque::all();
        //Villes--Pays:Maroc
        $ville= Ville::where('pays_id','=', 152)->orderby('libelle_ville','asc')->get();
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Ajouter une nouvelle agence bancaire';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return view('backoffice.ajout_agence',compact('classe_referentiel','classe_agences','classe_utilisation','classe_caisse','classe_tresorerie','ville','banque'));
        
    }
}
