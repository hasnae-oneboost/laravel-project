<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banque;
use App\Ville;
use App\Acce;
use Auth;
class ModifierBanqueController extends Controller
{
    
    public function index($id)
    {
        $classe_referentiel=1;
        $classe_banques=1;
        $banque= Banque::with('ville')->where('id',$id)->firstOrFail();
        $ville= Ville::where('pays_id','=', 152)->orderby('libelle_ville','asc')->get();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Modifier la banque: '.$banque->nom;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
       
        return view('backoffice.modifier_banque',compact('banque','classe_referentiel','classe_banques','ville'));
    }
}
