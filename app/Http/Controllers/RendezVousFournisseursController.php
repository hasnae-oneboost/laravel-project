<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\{Rendezvou,Fournisseur};
use Auth;
use App\User;
use App\Acce;
use Session;


class RendezVousFournisseursController extends Controller
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
    public function index($id)  
    {
        $classe_referentiel=1;
        $classe_consommation=1;
        $classe_fournisseurs=1;
            
        $fournisseurs=Fournisseur::find($id);
            
        $rendezvous=Rendezvou::where('fournisseur',$id)->get()->all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Rendez-vous fournisseur';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.rendez_vous_fournisseur',compact('rendezvous','fournisseurs','classe_fournisseurs','classe_referentiel','classe_transprt'));

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
        $req= new Rendezvou;

        //Validation
        $this->validate($request,[
            'date_heure'   => 'required',
            'description'   => 'required',
        ]);

        $req->fournisseur= Input::get('fournisseur_id');
        $req->client= null;        
        $req->date_heure= Input::get('date_heure');
        $req->description= Input::get('description');        
        
        $req->save();
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
   
    $req=Rendezvou::findOrFail($request->id);  
       //Validation
       $this->validate($request,[
        'date_heure'   => 'required',
        'description'   => 'required',
    ]);

    $req->fournisseur= Input::get('fournisseur_id');
    $req->client= null;
    $req->date_heure= Input::get('date_heure');
    $req->description= Input::get('description');
        
        $req->save();

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
        $req= Rendezvou::findOrFail($request->id);
        $req->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}

