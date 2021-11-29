<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pays;
use App\Societesassurance;
use App\Acce;
use Auth;

class AjoutCourtierController extends Controller
{
    public function index()
    {
        $classe_referentiel=1;
        $classe_juridique=1;
        $classe_assurance=1;
        $classe_ca=1;
        $pays = Pays::all();
        $societes = Societesassurance::all();
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Ajouter un nouveau courtier d assurance';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.ajout_courtier_assurance',compact('societes','pays','classe_assurance','classe_referentiel','classe_juridique','classe_ca'));
    
    }
}
