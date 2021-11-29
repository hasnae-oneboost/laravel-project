<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agence;
use App\Banque;
use App\Ville;
use App\Acce;
use Auth;

class ModifierAgenceController extends Controller
{
    public function index($id)
    {
        $classe_referentiel=1;
        $classe_agences=1; 
        $classe_utilisation=1;
        $classe_caisse=1;
        $classe_tresorerie=1;

        $banque= Banque::with('ville')->get();
        $ville= Ville::where('pays_id','=', 152)->orderby('libelle_ville','asc')->get();
        
        $agences = Agence::where('id',$id)->firstOrFail();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Modifier l agence bancaire: '.$agences->libelle;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.modifier_agence',compact('banque','classe_referentiel','classe_agences','classe_utilisation','classe_caisse','classe_tresorerie','ville','agences'));
    }
}
