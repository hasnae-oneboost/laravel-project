<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pays;
use App\Ville;
use App\Acce;
use Auth;

class AjoutFournisseurController extends Controller
{
    public function index()
    {
        $classe_referentiel=1;
        $classe_intervention=1;
        $classe_inter=1;
        $classe_fournisseur=1;
        $pays = Pays::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Ajouter un nouveau centre de visite technique';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.ajout_centre_VT',compact('pays','classe_inter','classe_referentiel','classe_intervention','classe_fournisseur'));
    
    }
}
