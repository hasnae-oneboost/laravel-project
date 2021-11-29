<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\{Vehicule,Marque,Gamme,Confort,Modele,Parc,Typesacquisition,Prestataire};

class ModifierVoitureServiceController extends Controller
{
    public function index($id)
    {
        $classe_accueil=1;
        $classe_flotte=1;
        $classe_parcs=1;
        $classe_voiture_service=1;
       
        $voitureservice= Vehicule::where('id',$id)->firstOrFail();

        $marques= Marque::all();
        $gammes= Gamme::all();
        $conforts= Confort::all();
        $modeles = Modele::all();
        $parcs=Parc::all();
        $types= Typesacquisition::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Modifier voiture de service: '.$voitureservice->code;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        $prestataires = Prestataire::all();
        
        return view('backoffice.modifier_voiture_service',compact('prestataires','voitureservice','typessemiremorq','marques','conforts','gammes','modeles','parcs','types','classe_parcs','classe_accueil','classe_flotte','classe_voiture_service'));
    }
}
