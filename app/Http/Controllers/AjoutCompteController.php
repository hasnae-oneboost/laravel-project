<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Agence;
use App\Banque;
use DB;
use App\Acce;
use Auth;

class AjoutCompteController extends Controller
{
    public function index()
    {
        $classe_referentiel=1;
        $classe_utilisation=1;
        $classe_caisse=1;
        $classe_tresorerie=1;
        $classe_comptes=1;
        
        $banque = Banque::all();
       
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Ajouter un nouveau compte bancaire';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return view('backoffice.ajout_compte',compact('classe_referentiel','classe_utilisation','classe_caisse','classe_tresorerie','classe_comptes','banque'));
        
    }
   
    
    public function getAgences($id) {
        $agences = DB::table("agences")->where("banque_id",$id)->pluck("libelle","id");

        return json_encode($agences);

    }

}
