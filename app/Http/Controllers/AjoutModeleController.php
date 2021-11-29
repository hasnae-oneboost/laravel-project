<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\{Categoriesvehicule,Marque,Gamme,Confort,Energie,Tva};
use DB;
use App\Acce;
use Auth;

class AjoutModeleController extends Controller
{
    public function index()
    {
        $classe_referentiel=1;
        $classe_classement=1;
        $classe_class=1;
        $classe_modele=1;
       
        $cats= Categoriesvehicule::all();
        $marques= Marque::all();
        $gammes= Gamme::all();
        $conforts= Confort::all();
        $energies= Energie::all();
        $tva = Tva::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Ajouter un nouveau modèle';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return view('backoffice.ajout_modele',compact('tva','energies','conforts','gammes','marques','cats','classe_class','classe_referentiel','classe_classement','classe_modele'));
        
    }
}
