<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicestation;
use App\Tarifsgasoil;
use App\Tva;
use Auth;
use App\Acce;

class VisualiserTarifsGasoilController extends Controller
{
    public function index($id)
    {
        $classe_referentiel=1;
        $classe_consommation=1;
        $classe_con_carburant=1;
        $classe_tarifs=1;       
        
        $tarifs= Tarifsgasoil::where('id',$id)->firstOrFail();
        $servicestation = Servicestation::all();
        $tva= Tva::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Visualiser tarifs de gasoil: id N°'.$tarifs->id;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return view('backoffice.visualiser_tarifs_gasoil',compact('tarifs','servicestation','tva','classe_tarifs','classe_con_carburant','classe_consommation','classe_referentiel'));
    }
}
