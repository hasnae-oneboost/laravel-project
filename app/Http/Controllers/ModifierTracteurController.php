<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicule;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\{Categoriesvehicule,Marque,Gamme,Confort,Modele,Parc,Typesacquisition,Prestataire};


class ModifierTracteurController extends Controller
{
    public function index($id)
    {
        $classe_accueil=1;
        $classe_flotte=1;
        $classe_parcs=1;
        $classe_tracteur=1;
       
        $tracteurs= Vehicule::where('id',$id)->firstOrFail();

        $categories= Categoriesvehicule::all();
        $marques= Marque::all();
        $gammes= Gamme::all();
        $conforts= Confort::all();
        $modeles = Modele::all();
        $parcs=Parc::all();
        $types= Typesacquisition::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Modifier tracteur: '.$tracteurs->code;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        $prestataires = Prestataire::all();
        
        return view('backoffice.modifier_tracteur',compact('prestataires','tracteurs','categories','marques','conforts','gammes','modeles','parcs','types','classe_parcs','classe_accueil','classe_flotte','classe_tracteur'));
    }
}
