<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personnel;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Diagnostic;
use App\Entreprise;
use PDF;
use DB;
use App\Vehicule;
use App\Demandesintervention;
use App\{Famillespiece,Categoriespiece,Piece};


class DiagnosticController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Créer', ['only' => ['create', 'store']]);    
        $this->middleware('permission:Modifier', ['only' => ['edit', 'update']]);   
        $this->middleware('permission:Supprimer', ['only' => ['show', 'delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classe_accueil=1;
        $classe_maintenance=1;
        $classe_diagnostic=1;       
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Diagnostic';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        $vehicule=Input::get('vehicule');
        $demandeur=Input::get('demandeur');


        if($vehicule !='' && $demandeur !='')  
            $diagnostics=Diagnostic::where('vehicule_id', $vehicule)
             ->where('demandeur_id' , $demandeur)
             ->paginate(10);

        elseif($vehicule != '')
            $diagnostics=Diagnostic::where('vehicule_id',$vehicule)->paginate(10);
            
        elseif($demandeur != '')
            $diagnostics=Diagnostic::where('demandeur_id',$demandeur)->paginate(10);
        
        else
            $diagnostics = Diagnostic::paginate(10);        

        $selected_demandeur=Input::get('demandeur');  
        $selected_vehicule=Input::get('vehicule');  

        $vehicules = Vehicule::all();
        $demandeurs= Personnel::where('categorie_id','8')->get();
       // $diagnostics= Diagnostic::paginate(10);       

        return view('backoffice.diagnostic',compact('vehicules','demandeurs','diagnostics','selected_vehicule','selected_demandeur','classe_utilisation','classe_accueil','classe_maintenance','classe_diagnostic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $diagnostics= new Diagnostic;
        //Validation 
        $this->validate($request,[
            'vehicule' => 'required',
            'demandeur' => 'required',
            'demande' => 'required',
        ]);       
        
        $diagnostics->vehicule_id= Input::get('vehicule');
        $diagnostics->demandeur_id= Input::get('demandeur');
        $diagnostics->demande_id= Input::get('demande');



        $diagnostics->famille_id= json_encode(Input::get('famille'));
        $diagnostics->piece_id= implode(',',Input::get('piece'));
        $diagnostics->categorie_id= implode(',',Input::get('categori'));
        $diagnostics->unite_id= implode(',',Input::get('unite'));

        
            

    
        $diagnostics->ajoute_par=Auth::user()->name;
        $diagnostics->modifie_par=' ';

     
        return back()->with('success','Ajout réussi');

    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $diagnostics= Diagnostic::findOrFail($request->id);
             //Validation 
        $this->validate($request,[
            'vehicule' => 'required',
            'demandeur' => 'required',
            'demande' => 'required',
        ]);       
        
        $diagnostics->vehicule_id= Input::get('vehicule');
        $diagnostics->demandeur_id= Input::get('demandeur');
        $diagnostics->demande_id= Input::get('demande');
        $diagnostics->modifie_par=Auth::user()->name;



        $diagnostics->save();
        return back()->with('success','Modification réussie');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $diagnostics= Diagnostic::findOrFail($request->id);
        $diagnostics->delete($request->all());
        return back()->with('success','Suppression réussie');        
    }

   public function ToPDF($id){
        $entreprise = Entreprise::findOrFail(1);
        $diagnostics=Diagnostic::findOrFail($id);
        $familles = Famillespiece::all();
        $categories = Categoriespiece::all();
        $pieces = Piece::all();

        $diag=Diagnostic::all();
       
        $pdf = PDF::loadView('backoffice.diagnostic_ve', compact('diag','diagnostics','entreprise','familles','categories','pieces'));
        return $pdf->download('diagnostic_'.$diagnostics->id.'.pdf');        
    }
}
