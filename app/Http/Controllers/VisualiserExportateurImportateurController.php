<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pays;
use App\Exportateurimportateur;
use App\Acce;
use Auth;

class VisualiserExportateurImportateurController extends Controller
{
    public function index($id)
    {
        $classe_referentiel=1;
        $classe_transprt=1;
        $classe_exportateurs_importateurs=1;
        $pays = Pays::all();
        $exportateurs_importateurs = Exportateurimportateur::where('id',$id)->firstOrFail();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Visualiser exportateur/importateur: '.$exportateurs_importateurs->raison_sociale;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return view('backoffice.visualiser_exportateur_importateur',compact('exportateurs_importateurs','pays','classe_exportateurs_importateurs','classe_referentiel','classe_transprt'));
    }
}
