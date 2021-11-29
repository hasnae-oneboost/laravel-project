<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Parc;
use Auth;
use App\Acce;
use App\Pays;

class ParcController extends Controller
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
        $classe_classement=1;
        $classe_class=1;
        $classe_parc=1;

        $parcs= Parc::all();
        $pays= Pays::all();       
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Parcs';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
       
        return view('backoffice.parcs',compact('parcs','pays','classe_class','classe_referentiel','classe_classement','classe_parc'));
     
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

        $parcs= new Parc;

        //Validation
        $this->validate($request,[
            'code'          => 'required',
            'nom'       => 'required',
            'adresse'   => 'required',
            'pays'   => 'required',
            'ville'  => 'required',
            'code_gestionnaire'   => 'required',
            'nom_gestionnaire' => 'required',
            'email_gestionnaire'   => 'required|email',
            'commentaire'   => 'required',
            
        ]);
        
        $parcs->code = Input::get('code');
        $parcs->nom = Input::get('nom');
        $parcs->adresse = Input::get('adresse');
        $parcs->pay_id = $request->get('pays');
        $parcs->ville_id = $request->get('ville');
        $parcs->code_gestionnaire = Input::get('code_gestionnaire');
        $parcs->nom_gestionnaire = Input::get('nom_gestionnaire');
        $parcs->email_gestionnaire = Input::get('email_gestionnaire');
        $parcs->commentaire = Input::get('commentaire');
        $parcs->ajoute_par = Auth::user()->name;
        $parcs->modifie_par = ' ';

        $parcs->save();
        
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
        
        $parcs = Parc::findOrFail($request->id);
        //Validation
        $this->validate($request,[
            'code'          => 'required',
            'nom'       => 'required',
            'adresse'   => 'required',
            'pays'   => 'required',
            'ville'  => 'required',
            'code_gestionnaire'   => 'required',
            'nom_gestionnaire' => 'required',
            'email_gestionnaire'   => 'required|email',
            'commentaire'   => 'required',
            
        ]);
        
        $parcs->code = Input::get('code');
        $parcs->nom = Input::get('nom');
        $parcs->adresse = Input::get('adresse');
        $parcs->pay_id = $request->get('pays');
        $parcs->ville_id = $request->get('ville');
        $parcs->code_gestionnaire = Input::get('code_gestionnaire');
        $parcs->nom_gestionnaire = Input::get('nom_gestionnaire');
        $parcs->email_gestionnaire = Input::get('email_gestionnaire');
        $parcs->commentaire = Input::get('commentaire');
        
        $parcs->modifie_par = Auth::user()->name;


        $parcs->save();
        
        
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
        $parcs= Parc::findOrFail($request->id);
        $parcs->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
    
}
