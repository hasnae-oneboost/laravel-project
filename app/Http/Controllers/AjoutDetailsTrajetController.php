<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detailstrajet;
use Auth;
use App\Acce;
use App\{Trajet,Categorietrajet};

class AjoutDetailsTrajetController extends Controller
{
    public function index()
    {
        $classe_referentiel=1;
        $classe_utilisation=1;
        $classe_transport=1;       
        $classe_details_trajet=1;
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Ajouter un detail';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        $details= Detailstrajet::all(); 
        $trajets= Trajet::all();
        $categories= Categorietrajet::all();      

        return view('backoffice.ajout_detail_trajets',compact('trajets','categories','details','classe_utilisation','classe_referentiel','classe_transport','classe_details_trajet'));

    }
}
