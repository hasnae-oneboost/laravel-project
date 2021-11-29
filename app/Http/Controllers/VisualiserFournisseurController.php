<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pays;
use App\Fournisseur;
use App\Acce;
use Auth;

class VisualiserFournisseurController extends Controller
{
    public function index($id)
    {
        $classe_referentiel=1;
        $classe_intervention=1;
        $classe_inter=1;
        $classe_fournisseur=1;
        $pays = Pays::all();

        $fournisseurs = Fournisseur::where('id',$id)->firstOrFail();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Visualiser centre de visite technique: '.$fournisseurs->libelle;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
       
        return view('backoffice.visualiser_centre_VT',compact('fournisseurs','pays','classe_inter','classe_referentiel','classe_intervention','classe_fournisseur'));
    
    }
}
