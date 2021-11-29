<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Societesassurance;
use Auth;
use App\Acce;

class SocietesAssurancesController extends Controller
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
        $classe_sa=1;        
        $societes= new Societesassurance;
        $societe= Input::get('societe');

        if($societe != '')            
            $societes=$societes->where('nom',$societe)->get();
        else
            $societes=Societesassurance::all();
        
        $selectedsociete = Input::get('societe');
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Societes d assurance';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return view('backoffice.societes_assurance',compact('selectedsociete','societes','classe_assurance','classe_referentiel','classe_juridique','classe_sa'));
    
        /*

        */
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

        $societes= new Societesassurance;

        //Validation
        $this->validate($request,[
            'matricule'          => 'required|unique:societes_assurances,matricule',
            'nom'       => 'required|unique:societes_assurances,nom',
            'adresse'   => 'required',
            'pays'   => 'required',
            'ville' => 'required',
            'rc'   => 'required',
            'patente'   => 'required',
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
        
        $societes->matricule = Input::get('matricule');
        $societes->nom = Input::get('nom');
        $societes->adresse = Input::get('adresse');
        $societes->pay_id = $request->get('pays');
        $societes->ville_id = $request->get('ville');
        $societes->rc = Input::get('rc');
        $societes->patente = Input::get('patente');
        $societes->if = Input::get('if');
        $societes->compte_bancaire = Input::get('compte_bancaire');
        $societes->capital = Input::get('capital');
        $societes->fixe1 = Input::get('fixe1');
        $societes->fixe2 = Input::get('fixe2');
        $societes->fixe3 = Input::get('fixe3');
        $societes->fixe4 = Input::get('fixe4');
        $societes->gsm1 = Input::get('gsm1');
        $societes->gsm2 = Input::get('gsm2');
        $societes->gerant = Input::get('gerant');
        $societes->nom_responsable = Input::get('nom_responsable');
        $societes->site_web = Input::get('site_web');
        $societes->commentaire = Input::get('commentaire');
        $societes->ajoute_par = Auth::user()->name;
        $societes->modifie_par = ' ';


        $societes->save();
        
        
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
        
        $societes = Societesassurance::findOrFail($request->id);
        //Validation
        $this->validate($request,[
            'matricule'          => 'required|unique:societes_assurances,matricule,'.$societes->id,
            'nom'       => 'required|unique:societes_assurances,nom,'.$societes->id,
            'adresse'   => 'required',
            'pays'   => 'required',
            'ville'  => 'required',
            'rc'   => 'required',
            'patente'   => 'required',
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

        $societes->matricule = Input::get('matricule');
        $societes->nom = Input::get('nom');
        $societes->adresse = Input::get('adresse');
        $societes->pay_id = $request->get('pays');
        $societes->ville_id =$request->get('ville');
        $societes->rc = Input::get('rc');
        $societes->patente = Input::get('patente');
        $societes->if = Input::get('if');
        $societes->compte_bancaire = Input::get('compte_bancaire');
        $societes->capital = Input::get('capital');
        $societes->fixe1 = Input::get('fixe1');
        $societes->fixe2 = Input::get('fixe2');
        $societes->fixe3 = Input::get('fixe3');
        $societes->fixe4 = Input::get('fixe4');
        $societes->gsm1 = Input::get('gsm1');
        $societes->gsm2 = Input::get('gsm2');
        $societes->gerant = Input::get('gerant');
        $societes->nom_responsable = Input::get('nom_responsable');
        $societes->site_web = Input::get('site_web');
        $societes->commentaire = Input::get('commentaire');
        
        $societes->modifie_par = Auth::user()->name;


        $societes->save();
        
        
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
        $societe= Societesassurance::findOrFail($request->id);
        $societe->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }

    

    
}
