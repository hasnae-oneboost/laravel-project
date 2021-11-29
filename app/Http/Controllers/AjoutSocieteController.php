<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pays;
use App\Ville;
use App\Acce;
use Auth;

class AjoutSocieteController extends Controller
{
    public function index()
    {
        $classe_referentiel=1;
        $classe_juridique=1;
        $classe_assurance=1;
        $classe_sa=1;
        $pays = Pays::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Ajouter une nouvelle société d assurance';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.ajout_societe_assurance',compact('pays','classe_assurance','classe_referentiel','classe_juridique','classe_sa'));
    
    }

    public function getVilles($id) {

        $villes = Ville::where('pays_id',$id)->pluck('libelle_ville','id');

        return json_encode($villes);
    }
}
 