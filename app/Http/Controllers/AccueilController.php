<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Acce;
use Auth;


class AccueilController extends Controller
{
    public function index()
    {
        
        $classe_accueil=1;

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Accueil';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return View('backoffice.accueil',compact('classe_accueil'));
    }
}
