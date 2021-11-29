<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personnel;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Demandesintervention;
use App\Entreprise;
use PDF;
use DB;
use App\Vehicule;
use App\Diagnostic;


class DemandesInterventionsController extends Controller
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
        $classe_demandeintervention=1;       
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Demandes d interventions';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        $vehicule=Input::get('vehicule');
        $demandeur=Input::get('demandeur');

        if($vehicule !='' && $demandeur !='')  
            $demandes=Demandesintervention::where('vehicule_id', $vehicule)
             ->where('demandeur_id' , $demandeur)
             ->paginate(10);

        elseif($vehicule != '')
            $demandes=Demandesintervention::where('vehicule_id',$vehicule)->paginate(10);
            
        elseif($demandeur != '')
            $demandes=Demandesintervention::where('demandeur_id',$demandeur)->paginate(10);
        
        else
            $demandes = Demandesintervention::paginate(10);        

        $selected_demandeur=Input::get('demandeur');  
        $selected_vehicule=Input::get('vehicule');  

        $diagnostic = Diagnostic::all();

        $vehicules = Vehicule::all();
        $demandeurs= Personnel::where('categorie_id','8')->get();
       //$demandes= Demandesintervention::paginate(10);       

        return view('backoffice.demandes_interventions',compact('diagnostic','vehicules','demandeurs','demandes','selected_vehicule','selected_demandeur','classe_utilisation','classe_accueil','classe_maintenance','classe_demandeintervention'));
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
        $demandes= new Demandesintervention;
        //Validation 
        $this->validate($request,[
            'vehicule' => 'required',
            'demandeur' => 'required',
            'description' => 'required',
            'date_demande' => 'required',
            'kilometrage' => 'required',
            'index_horaire' => 'required',
            'categorie' => 'required',
            'gravite' => 'required',
            'urgence' => 'required',           
        ]);       
        
        $demandes->vehicule_id= Input::get('vehicule');
        $demandes->demandeur_id= Input::get('demandeur');

        $categorie =implode(', ',Input::get('categorie'));        
        $demandes->categorie = $categorie;
        
        $demandes->gravite_id = Input::get('gravite');
        $demandes->urgence_id = Input::get('urgence');
        $demandes->description= Input::get('description');
        $demandes->numero_systeme= Input::get('numero_systeme');
        $demandes->date_demande= Input::get('date_demande');
        $demandes->kilometrage= Input::get('kilometrage');
        $demandes->index_horaire=Input::get('index_horaire');
        $demandes->ajoute_par=Auth::user()->name;
        $demandes->modifie_par=' ';


        DB::table('vehicules')->where('id',$request->vehicule)->update(            
            array(       
            'etat' => 'En panne',
            )
       );

         DB::table('vehicules')->where('id',$request->vehicule)->update(            
                    array(       
                    'kilometrage' => Input::get('kilometrage'),
                    )
                    );
        
        DB::table('vehicules')->where('id',$request->vehicule)->where('type_vehicule','Semi-remorque')->update(            
                    array(       
                    'index_horaire' => Input::get('index_horaire'),
                    )
            );
       


        $demandes->save();

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
        $demandes= Demandesintervention::findOrFail($request->id);
            //Validation 
            $this->validate($request,[
                'vehicule' => 'required',
                'demandeur' => 'required',
                'description' => 'required',
                'date_demande' => 'required',
                'kilometrage' => 'required',
                'index_horaire' => 'required',
                'categorie' => 'required',
                'gravite' => 'required',
                'urgence' => 'required',           
    
            ]);       
            
            $demandes->vehicule_id= Input::get('vehicule');
            $demandes->demandeur_id= Input::get('demandeur');

            $categorie =implode(', ',Input::get('categorie'));        
            $demandes->categorie = $categorie;
            $demandes->gravite_id = Input::get('gravite');
            $demandes->urgence_id = Input::get('urgence');
            $demandes->description= Input::get('description');
            $demandes->numero_systeme= Input::get('numero_systeme');
            $demandes->date_demande= Input::get('date_demande');
            $demandes->kilometrage= Input::get('kilometrage');
            $demandes->index_horaire=Input::get('index_horaire');
            $demandes->modifie_par=Auth::user()->name;


           
                   DB::table('vehicules')->where('id',$request->vehicule)->update(            
                        array(       
                        'kilometrage' => Input::get('kilometrage'),
                        )
                        );
                
    
                    DB::table('vehicules')->where('id',$request->vehicule)->where('type_vehicule','Semi-remorque')->update(            
                        array(       
                        'index_horaire' => Input::get('index_horaire'),
                        )
                );
           

        $demandes->save();
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
        $demandes= Demandesintervention::findOrFail($request->id);
        $demandes->delete($request->all());
        return back()->with('success','Suppression réussie');        
    }

    public function ToPDF($id){
        $entreprise = Entreprise::findOrFail(1);
        $demandes=Demandesintervention::findOrFail($id);
       
        $pdf = PDF::loadView('backoffice.imprimer_informations_demande_intervention', compact('demandes','entreprise'));
        return $pdf->download('informations_demande_intervention_'.$demandes->id.'.pdf');        
    }
}
