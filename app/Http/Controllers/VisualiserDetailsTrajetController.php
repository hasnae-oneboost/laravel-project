<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\{Acce,Detailstrajet,Trajet,Categorietrajet};


class VisualiserDetailsTrajetController extends Controller
{
    //
    public function index($id)
    {
        $classe_referentiel=1;
        $classe_utilisation=1;
        $classe_transport=1;       
        $classe_details_trajet=1;
        $details= Detailstrajet::findOrFail($id); 
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Visualier les détails du trajet: '.$details->trajet->libelle;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        $trajets= Trajet::all();
        $categories= Categorietrajet::all();      

        return view('backoffice.visualiser_detail_trajets',compact('trajets','categories','details','classe_utilisation','classe_referentiel','classe_transport','classe_details_trajet'));

    }
}
