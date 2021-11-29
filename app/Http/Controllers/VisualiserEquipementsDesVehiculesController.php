<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Equipementsvehicule;
use Auth;
use App\User;
use App\Acce;
use App\{Vehicule,Equipementvehicule,fournisseur,Typeequipementvehicule,Tva};

class VisualiserEquipementsDesVehiculesController extends Controller
{
    public function index($id)
    {
        $classe_accueil=1;
        $classe_flotte=1;
        $classe_equipement_vehicule=1;
        
        $equipementsvehicules= Equipementsvehicule::where('id',$id)->firstOrFail();
        $vehicules= Vehicule::where('prestataire','DSH TRANS')->get();
        $fournisseurs= Fournisseur::where('type','Fournisseur de vehicules')->get();
        $equipements = Equipementvehicule::all();
        $typesequipement = Typeequipementvehicule::all(); 
        $tva = Tva::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Visualiser lequipement de véhicule N°'.$id;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.visualiser_equipement_vehicule',compact('tva','equipementsvehicules','fournisseurs','typesequipement','equipements','vehicules','classe_accueil','classe_flotte','classe_equipement_vehicule'));
    
    }
}
