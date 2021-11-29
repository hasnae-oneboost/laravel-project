<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Courtiersassurance;
use App\Societesassurance;

use Auth;
use App\Acce;

class CourtiersAssurancesController extends Controller
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
     
        $classe_referentiel=1;
        $classe_juridique=1;
        $classe_assurance=1;
        $classe_ca=1;
        $courtier_id=Input::get('courtier_id');
        $societe_id = Input::get('societe_id');
        if($courtier_id !=''){          
            $courtiers=Courtiersassurance::where('id',$courtier_id)->get();  
        }
        elseif($societe_id != ''){
            $courtiers=Courtiersassurance::where('societe_assurance_id',$societe_id)->get();            
        }
        elseif($courtier_id !='' && $societe_id != ''){          
            $courtiers=Courtiersassurance::where('id',$courtier_id)->where('societe_assurance_id',$societe_id)->get();  
        }                  
        else
            $courtiers=Courtiersassurance::all();       

        $selected_societe = Input::get('societe_id');
        $selected_courtier= Input::get('courtier_id'); 
          
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Courtiers d assurance';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return view('backoffice.courtiers_assurance',compact('courtiers','selected_societe','selected_courtier','classe_assurance','classe_referentiel','classe_juridique','classe_ca'));

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
        
        $courtiers= new Courtiersassurance;

         //Validation
         $this->validate($request,[
            'matricule'          => 'required|unique:courtiers_assurances,matricule',
            'nom'       => 'required|unique:courtiers_assurances,nom',
            'adresse'   => 'required',
            'pays'   => 'required',
            'ville' => 'required',
            'societe_assurance' => 'required',
            'rc'   => 'required',
            'if'   => 'required',
            'compte_bancaire'   => 'required',
            'capital'   => 'required',
            'fixe1'   => 'required',
            'fixe2'   => 'required',
            'fixe3'   => 'required',
            'fixe4'   => 'required',
            'gsm1'   => 'required',
            'gsm2'   => 'required',
            'gerant'   => 'required',
            'nom_responsable'   => 'required',
            'site_web'   => 'required',
            'commentaire'   => 'required',
            
        ]);

        $courtiers->matricule = Input::get('matricule');
        $courtiers->nom = Input::get('nom');
        $courtiers->adresse = Input::get('adresse');
        $courtiers->pay_id = $request->get('pays');
        $courtiers->ville_id = $request->get('ville');
        $courtiers->societe_assurance_id = $request->get('societe_assurance');
        $courtiers->rc = Input::get('rc');
        $courtiers->patente = Input::get('patente');
        $courtiers->if = Input::get('if');
        $courtiers->compte_bancaire = Input::get('compte_bancaire');
        $courtiers->capital = Input::get('capital');
        $courtiers->fixe1 = Input::get('fixe1');
        $courtiers->fixe2 = Input::get('fixe2');
        $courtiers->fixe3 = Input::get('fixe3');
        $courtiers->fixe4 = Input::get('fixe4');
        $courtiers->gsm1 = Input::get('gsm1');
        $courtiers->gsm2 = Input::get('gsm2');
        $courtiers->gerant = Input::get('gerant');
        $courtiers->nom_responsable = Input::get('nom_responsable');
        $courtiers->site_web = Input::get('site_web');
        $courtiers->commentaire = Input::get('commentaire');
        $courtiers->ajoute_par = Auth::user()->name;
        $courtiers->modifie_par = ' ';


        $courtiers->save();
        
        
        return back()->with('success', 'Ajout réussi');
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
        $courtiers = Courtiersassurance::findOrFail($request->id);
        
        //Validation
        $this->validate($request,[
            'matricule'          => 'required|unique:courtiers_assurances,matricule,'.$courtiers->id,
            'nom'       => 'required|unique:courtiers_assurances,nom,'.$courtiers->id,
            'adresse'   => 'required',
            'pays'   => 'required',
            'ville' => 'required',
            'societe_assurance' => 'required',
            'rc'   => 'required',
            'if'   => 'required',
            'compte_bancaire'   => 'required',
            'capital'   => 'required',
            'fixe1'   => 'required',
            'fixe2'   => 'required',
            'fixe3'   => 'required',
            'fixe4'   => 'required',
            'gsm1'   => 'required',
            'gsm2'   => 'required',
            'gerant'   => 'required',
            'nom_responsable'   => 'required',
            'site_web'   => 'required',
            'commentaire'   => 'required',
            
        ]);
        
        $courtiers->matricule = Input::get('matricule');
        $courtiers->nom = Input::get('nom');
        $courtiers->adresse = Input::get('adresse');
        $courtiers->pay_id = $request->get('pays');
        $courtiers->ville_id = $request->get('ville');
        $courtiers->societe_assurance_id = $request->get('societe_assurance');
        $courtiers->rc = Input::get('rc');
        $courtiers->patente = Input::get('patente');
        $courtiers->if = Input::get('if');
        $courtiers->compte_bancaire = Input::get('compte_bancaire');
        $courtiers->capital = Input::get('capital');
        $courtiers->fixe1 = Input::get('fixe1');
        $courtiers->fixe2 = Input::get('fixe2');
        $courtiers->fixe3 = Input::get('fixe3');
        $courtiers->fixe4 = Input::get('fixe4');
        $courtiers->gsm1 = Input::get('gsm1');
        $courtiers->gsm2 = Input::get('gsm2');
        $courtiers->gerant = Input::get('gerant');
        $courtiers->nom_responsable = Input::get('nom_responsable');
        $courtiers->site_web = Input::get('site_web');
        $courtiers->commentaire = Input::get('commentaire');        
        $courtiers->modifie_par = Auth::user()->name;


        $courtiers->save();
        
        
        return back()->with('success', 'Modification réussie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $courtiers= Courtiersassurance::findOrFail($request->id);
        $courtiers->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
