<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tracteur;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\{Voituresservice,Marque,Gamme,Confort,Modele,Parc,Typesacquisition};
use App\Prestataire;

class AjoutVoitureServiceController extends Controller
{
    public function index()
    {
        $classe_accueil=1;
        $classe_flotte=1;
        $classe_parcs=1;
        $classe_voiture_service=1;

        $voitureservice= Voituresservice::all();
        $marques= Marque::all();
        $gammes= Gamme::all();
        $conforts= Confort::all();
        $modeles = Modele::all();
        $parcs=Parc::all();
        $types= Typesacquisition::all();

        $prestataires = Prestataire::all();
        
            $acces= new Acce;
            $acces->utilisateur= Auth::user()->name;
            $acces->page= 'Ajouter une nouvelle voiture de service';
            $acces->date=date("Y-m-d h:i:s");
            $acces->save();

        return view('backoffice.ajout_voiture_service',compact('prestataires','voitureservice','marques','conforts','gammes','modeles','parcs','types','classe_parcs','classe_accueil','classe_flotte','classe_voiture_service'));
    }
}
