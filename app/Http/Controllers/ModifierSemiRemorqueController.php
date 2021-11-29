<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicule;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\{Typessemiremorque,Marque,Gamme,Confort,Modele,Parc,Typesacquisition,Prestataire};


class ModifierSemiRemorqueController extends Controller
{
    public function index($id)
    {
        $classe_accueil=1;
        $classe_flotte=1;
        $classe_parcs=1;
        $classe_semi_remorque=1;
       
        $semiremorques= Vehicule::where('id',$id)->firstOrFail();

        $typessemiremorq= Typessemiremorque::all();
        $marques= Marque::all();
        $gammes= Gamme::all();
        $conforts= Confort::all();
        $modeles = Modele::all();
        $parcs=Parc::all();
        $types= Typesacquisition::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Modifier semi-remorque: '.$semiremorques->code;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        $prestataires = Prestataire::all();
        
        return view('backoffice.modifier_semi_remorque',compact('prestataires','semiremorques','typessemiremorq','marques','conforts','gammes','modeles','parcs','types','classe_parcs','classe_accueil','classe_flotte','classe_semi_remorque'));
    }
}
