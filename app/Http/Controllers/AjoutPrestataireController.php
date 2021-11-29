<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pays;
use App\Acce;
use Auth;

class AjoutPrestataireController extends Controller
{
    public function index()
    {
        $classe_referentiel=1;
        $classe_transprt=1;
        $classe_prestataire=1;

        $pays = Pays::all();
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Ajouter un nouveau prestataire';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.ajout_prestataire',compact('pays','classe_prestataire','classe_referentiel','classe_transprt'));
    }
}
