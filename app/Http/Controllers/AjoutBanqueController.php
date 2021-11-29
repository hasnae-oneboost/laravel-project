<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banque;
use App\Agence;
use DB;
use App\Ville;
use App\Acce;
use Auth;

class AjoutBanqueController extends Controller
{
    public function index()
    {
        $classe_referentiel=1;
        $classe_banques=1;
        $banque= Banque::with('ville')->get();
        //Villes--Pays:Maroc
        $ville= Ville::where('pays_id','=', 152)->orderby('libelle_ville','asc')->get();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Ajouter une nouvelle banque';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return view('backoffice.ajout_banque',compact('classe_referentiel','classe_banques','banque','ville'));
        
    }
  
    

}
