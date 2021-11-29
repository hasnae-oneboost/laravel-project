<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pays;
use App\Acce;
use Auth;

class AjoutExportateurImportateurController extends Controller
{
        public function index()
        {
            $classe_referentiel=1;
            $classe_transprt=1;
            $classe_exportateurs_importateurs=1;
    
            $pays = Pays::all();
            
            $acces= new Acce;
            $acces->utilisateur= Auth::user()->name;
            $acces->page= 'Ajouter un nouveau exportateur ou importateur';
            $acces->date=date("Y-m-d h:i:s");
            $acces->save();
    
            return view('backoffice.ajout_exportateur_importateur',compact('pays','classe_exportateurs_importateurs','classe_referentiel','classe_transprt'));
        }
}
