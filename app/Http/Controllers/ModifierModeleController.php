<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modele;
use App\{Marque,Gamme,Confort,Energie,Categoriesvehicule,Tva};
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class ModifierModeleController extends Controller
{
    public function index($id)
    {
        $classe_referentiel=1;
        $classe_classement=1;
        $classe_class=1;
        $classe_modele=1;
       
        $modeles= Modele::where('id',$id)->firstOrFail();
        $cats= Categoriesvehicule::all();
        $marques= Marque::all();
        $gammes= Gamme::all();
        $conforts= Confort::all();
        $energies= Energie::all();
        $tva = Tva::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Modifier modèle: '.$modeles->nom;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return view('backoffice.modifier_modele',compact('modeles','tva','energies','conforts','gammes','marques','cats','classe_class','classe_referentiel','classe_classement','classe_modele'));    
    }
}
