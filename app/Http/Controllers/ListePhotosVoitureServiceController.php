<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voituresservicesphoto;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;


class ListePhotosVoitureServiceController extends Controller
{
    public function index($id)
    {
        $classe_accueil=1;
        $classe_flotte=1;
        $classe_parcs=1;
        $classe_voiture_service=1;
        
        $voitureservicephotos= Voituresservicesphoto::where('voiture_id',$id)->get()->all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Liste des photos de la voiture de service';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return view('backoffice.liste_photos_voiture_service',compact('voitureservicephotos','classe_parcs','classe_accueil','classe_flotte','classe_voiture_service'));
    }
}
