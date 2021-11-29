<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pays;
use App\Ville;
use App\Acce;
use Auth;
use App\Fournisseur;

class ModifierFournisseurVehiculeController extends Controller
{
    public function index($id)
    {
        $classe_referentiel=1;
        $classe_classement=1;
        $classe_contrat=1;
        $classe_four_vehicule=1;

        $pays = Pays::all();

        $fournisseurs = Fournisseur::where('id',$id)->firstOrFail();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Modifier fournisseur de véhicules: '.$fournisseurs->libelle;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();       

        $values = explode(", ", $fournisseurs->activite);
        

        return view('backoffice.modifier_fournisseur_vehicule',compact('pays','values','fournisseurs','classe_classement','classe_referentiel','classe_contrat','classe_four_vehicule'));
    
    }
}
