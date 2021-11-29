<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Lieu,Acce,Trajet};
use Auth;

class ModifierTrajetController extends Controller
{
    public function index($id)
    {
        $classe_referentiel=1;
        $classe_utilisation=1;
        $classe_transport=1;       
        $classe_trajets=1;
        $trajets= Trajet::where('id',$id)->firstOrFail();
                
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Modifier le trajet N° '.$trajets->numero;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        $lieux=Lieu::all();
        $lieu1=Lieu::where('type','Chargement')->get();
        $lieu2=Lieu::where('type','Dechargement')->get();
        $lieudouane=Lieu::where('type','douane')->get();
        
        return view('backoffice.modifier_trajet',compact('trajets','lieux','lieudouane','lieu1','lieu2','classe_utilisation','classe_referentiel','classe_transport','classe_trajets'));

    }
}
