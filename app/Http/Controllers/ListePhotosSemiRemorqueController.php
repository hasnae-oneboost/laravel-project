<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semiremorquesphoto;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class ListePhotosSemiRemorqueController extends Controller
{
    public function index($id)
    {
        $classe_accueil=1;
        $classe_flotte=1;
        $classe_parcs=1;
        $classe_semi_remorque=1;
        
        $semiremorquephotos= Semiremorquesphoto::where('semiremorque_id',$id)->get()->all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Liste des photos du semi-remorque';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return view('backoffice.liste_photos_semi_remorque',compact('semiremorquephotos','classe_parcs','classe_accueil','classe_flotte','classe_semi_remorque'));
    }
}
