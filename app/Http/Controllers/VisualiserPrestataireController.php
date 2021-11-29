<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pays;
use App\Prestataire;
use App\Acce;
use Auth;

class VisualiserPrestataireController extends Controller
{
    public function index($id)
    {
        $classe_referentiel=1;
        $classe_transprt=1;
        $classe_prestataire=1;

        $pays = Pays::all();
        $prestataires = Prestataire::where('id',$id)->firstOrFail();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Visualiser prestataire: '.$prestataires->raison_sociale;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return view('backoffice.visualiser_prestataire',compact('prestataires','pays','classe_prestataire','classe_referentiel','classe_transprt'));
    }

}
