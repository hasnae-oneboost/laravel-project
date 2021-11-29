<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tracteursphoto ;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class ListePhotosTracteurController extends Controller
{
    public function index($id)
    {
        $classe_accueil=1;
        $classe_flotte=1;
        $classe_parcs=1;
        $classe_tracteur=1;
        
        $tracteurphotos= Tracteursphoto ::where('tracteur_id',$id)->get()->all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Liste des photos du tracteur ID N°';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return view('backoffice.liste_photos_tracteur',compact('tracteurphotos','classe_parcs','classe_accueil','classe_flotte','classe_tracteur'));
    }
}
