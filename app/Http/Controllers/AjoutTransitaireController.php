<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pays;
use App\Echeance;
use App\Acce;
use Auth;

class AjoutTransitaireController extends Controller
{
    public function index()
    {
        $classe_referentiel=1;
        $classe_transprt=1;
        $classe_transitaire=1;

        $pays = Pays::all();
        $echeances = Echeance::all();
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Ajouter un nouveau transitaire';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.ajout_transitaire',compact('echeances','pays','classe_transitaire','classe_referentiel','classe_transprt'));
    }
}
