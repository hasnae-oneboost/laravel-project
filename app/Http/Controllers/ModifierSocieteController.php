<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pays;
use App\Societesassurance;
use App\Acce;
use Auth;

class ModifierSocieteController extends Controller
{
    public function index($id)
    {
        $classe_referentiel=1;
        $classe_juridique=1;
        $classe_assurance=1;
        $classe_sa=1;
        $pays = Pays::all();

        $societes = Societesassurance::where('id',$id)->firstOrFail();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Modifier la societe d assurance: '.$societes->nom;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
       
        return view('backoffice.modifier_societe_assurance',compact('societes','pays','classe_assurance','classe_referentiel','classe_juridique','classe_sa'));
    
    }

}
