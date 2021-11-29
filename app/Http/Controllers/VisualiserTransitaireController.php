<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pays;
use App\Echeance;
use App\Transitaire;
use App\Acce;
use Auth;

class VisualiserTransitaireController extends Controller
{
    public function index($id)
    {
        $classe_referentiel=1;
        $classe_transprt=1;
        $classe_transitaire=1;

        $pays = Pays::all();
        $echeances = Echeance::all();
        
        $transitaires = Transitaire::where('id',$id)->firstOrFail();
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Visualiser transitaire: '.$transitaires->code;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.visualiser_transitaire',compact('transitaires','echeances','pays','classe_transitaire','classe_referentiel','classe_transprt'));
    
    }
}
