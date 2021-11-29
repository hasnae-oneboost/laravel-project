<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pays;
use App\Echeance;
use App\Acce;
use Auth;
use Session;

class AjoutClientController extends Controller
{
    public function index()
    {
        $classe_referentiel=1;
        $classe_transprt=1;
        $classe_client=1;

        $pays = Pays::all();
        $echeances = Echeance::all();
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Ajouter un nouveau client';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
 
        return view('backoffice.ajout_client',compact('echeances','pays','classe_client','classe_referentiel','classe_transprt'));
    
    }
}
