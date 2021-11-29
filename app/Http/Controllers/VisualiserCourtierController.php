<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Pays,Courtiersassurance,Societesassurance};
use App\Acce;
use Auth;
class VisualiserCourtierController extends Controller
{
    public function index($id)
    {
        $classe_referentiel=1;
        $classe_juridique=1;
        $classe_assurance=1;
        $classe_ca=1;
        $pays = Pays::all();

        $courtiers = Courtiersassurance::where('id',$id)->firstOrFail();
       $societes = Societesassurance::all();

       $acces= new Acce;
       $acces->utilisateur= Auth::user()->name;
       $acces->page= 'Visualiser les informations du courtier '.$courtiers->nom;
       $acces->date=date("Y-m-d h:i:s");
       $acces->save();
        
        return view('backoffice.visualiser_courtier_assurance',compact('courtiers','societes',
        'pays','classe_assurance','classe_referentiel','classe_juridique','classe_ca'));
    }
}
