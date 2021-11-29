<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Acce,Lieu,Trajet};
use Auth;

class AjoutTrajetController extends Controller
{
    public function index()
    {
        $classe_referentiel=1;
        $classe_utilisation=1;
        $classe_transport=1;       
        $classe_trajets=1;
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Ajouter un nouveau trajet';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        $lieux=Lieu::all();
        $lieu1=Lieu::where('type','Chargement')->get();
        $lieu2=Lieu::where('type','Dechargement')->get();
        $lieudouane=Lieu::where('type','douane')->get();
        
        $trajets= Trajet::all();
        return view('backoffice.ajout_trajet',compact('trajets','lieudouane','lieux','lieu1','lieu2','classe_utilisation','classe_referentiel','classe_transport','classe_trajets'));

    }
}
