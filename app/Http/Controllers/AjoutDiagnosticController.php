<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Vehicule;
use App\Pays;
use App\Personnel;
use App\{Categoriesdintervention,Famillespiece,Categoriespiece,Piece};
use App\Demandesintervention;
use App\Diagnostic;

class AjoutDiagnosticController extends Controller
{
    public function index($id)
    {
        $classe_accueil=1;
        $classe_maintenance=1;
        $classe_demandeintervention=1; 


        $familles = Famillespiece::all();
        $categoriespieces = Categoriespiece::all();
        $pieces = Piece::all();


        $demandeinterventions=Demandesintervention::find($id);
        
        $diagnostics=Diagnostic::where('demande_id',$id)->get()->all();
                
            $acces= new Acce;
            $acces->utilisateur= Auth::user()->name;
            $acces->page= 'Ajouter une nouvelle demande d intervention';
            $acces->date=date("Y-m-d h:i:s");
            $acces->save();

        return view('backoffice.ajout_diagnostic',compact('demandeinterventions','diagnostics','pieces','categoriespieces','familles','conducteurs','demandes','vehicules','categories','gravites','urgences','classe_accueil','classe_maintenance','classe_demandeintervention'));
   
    }

    public function getCategories($id) {

        $categories = Categoriespiece::where('famille_id',$id)->pluck('libelle','id');

        return json_encode($categories);
    }

    public function getPieces($id) {

        $pieces = Piece::where('categorie_id',$id)->pluck('libelle','id');

        return json_encode($pieces);
    }

}
