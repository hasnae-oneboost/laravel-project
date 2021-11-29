<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banque;
use App\Agence;
use App\Compte;
use App\Acce;
use Auth;

class ModifierCompteController extends Controller
{
    public function index($id)
    {
        $classe_referentiel=1;
        $classe_comptes=1;
        $banque= Banque::with('ville')->get();
        $agence= Agence::all();
        
        $comptes = Compte::where('id',$id)->firstOrFail();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Modifier le compte bancaire: '.$comptes->libelle;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.modifier_compte',compact('banque','classe_referentiel','classe_comptes','comptes','agence'));
    }
}
