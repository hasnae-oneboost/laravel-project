<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Equipementsvehicule;
use Auth;
use App\User;
use App\Acce;
use App\{Vehicule,Equipementvehicule,fournisseur,Typeequipementvehicule,Tva};


class AjoutEquipementsDesVehiculesController extends Controller
{
    public function index()
    {
        $classe_accueil=1;
        $classe_flotte=1;
        $classe_equipement_vehicule=1;
        
        $equipementsvehicules= Equipementsvehicule::all();
        $vehicules= Vehicule::where('prestataire','DSH TRANS')->get();
        $fournisseurs= Fournisseur::where('type','Fournisseur de vehicules')->get();
        $equipements = Equipementvehicule::all();
        $typesequipement = Typeequipementvehicule::all(); 
        $tva = Tva::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Ajouter un nouveau equipement de véhicule';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.ajout_equipement_vehicule',compact('tva','equipementsvehicules','fournisseurs','typesequipement','equipements','vehicules','classe_accueil','classe_flotte','classe_equipement_vehicule'));
    
    }

    public function getEquipements($id) {

        $equipements = Equipementvehicule::where('type_id',$id)->pluck('libelle','id');

        return json_encode($equipements);
    }
}
