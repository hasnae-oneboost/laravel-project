<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicestation;
use App\Tva;
use Auth;
use App\Acce;

class AjoutTarifsGasoilController extends Controller
{
    public function index()
    {
        $classe_referentiel=1;
        $classe_consommation=1;
        $classe_con_carburant=1;
        $classe_tarifs=1;       
        
        $servicestation = Servicestation::all();
        $tva= Tva::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Ajouter un nouveau tarif de gasoil';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return view('backoffice.ajout_tarifs_gasoil',compact('servicestation','tva','classe_tarifs','classe_con_carburant','classe_consommation','classe_referentiel'));
    }

}
