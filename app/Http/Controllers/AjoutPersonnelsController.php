<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\{Pays,Nationalite,Categoriesposte,Banque};
use App\Personnel;

class AjoutPersonnelsController extends Controller
{
    public function index()
    {
        $classe_accueil=1;
        $classe_ressource_humaine=1;
        $classe_personnels=1;

        $pays= Pays::all();
        $nationalites= Nationalite::all();
        $categories= Categoriesposte::all();
        $banques= Banque::all();
       
        $personnels = Personnel::all();
        
            $acces= new Acce;
            $acces->utilisateur= Auth::user()->name;
            $acces->page= 'Ajouter un nouveau personnel';
            $acces->date=date("Y-m-d h:i:s");
            $acces->save();

        return view('backoffice.ajout_personnel',compact('personnels','pays','nationalites','banques','categories','classe_personnels','classe_accueil','classe_ressource_humaine'));
   
    }
}
