<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\{Typessemiremorque,Marque,Gamme,Confort,Modele,Parc,Typesacquisition};
use App\Prestataire;

class AjoutSemiRemorqueController extends Controller
{
    public function index()
    {
        $classe_accueil=1;
        $classe_flotte=1;
        $classe_parcs=1;
        $classe_semi_remorque=1;


        $typessemiremorq= Typessemiremorque::all();
        $marques= Marque::all();
        $gammes= Gamme::all();
        $conforts= Confort::all();
        $modeles = Modele::all();
        $parcs=Parc::all();
        $types= Typesacquisition::all();

        $prestataires = Prestataire::all();
        
            $acces= new Acce;
            $acces->utilisateur= Auth::user()->name;
            $acces->page= 'Ajouter un nouveau semi-remorque';
            $acces->date=date("Y-m-d h:i:s");
            $acces->save();

        return view('backoffice.ajout_semi_remorque',compact('prestataires','typessemiremorq','marques','conforts','gammes','modeles','parcs','types','classe_parcs','classe_accueil','classe_flotte','classe_semi_remorque'));
   
    }
}
