<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Peagesautoroute;
use App\Categoriesvehicule;
use App\Tva;
use Auth;
use App\Acce;

class AjoutTarifsAutorouteController extends Controller
{
    public function index()
    {
        $classe_referentiel=1;
        $classe_consommation=1;
        $classe_peage_auto=1;
        $classe_tarifs_auto=1;       
        
        $peages = Peagesautoroute::all();
        $categories= Categoriesvehicule::all();
        $tva= Tva::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Ajouter un nouveau tarif d autoroute';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return view('backoffice.ajout_tarifs',compact('peages','tva','classe_tarifs_auto','categories','classe_peage_auto','classe_consommation','classe_referentiel'));
    }
}
