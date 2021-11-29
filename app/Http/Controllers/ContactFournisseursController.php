<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\{Contact,Fournisseur};
use Auth;
use App\User;
use App\Acce;

class ContactFournisseursController extends Controller
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
            
        $contacts=Contact::where('fournisseur',$id)->get()->all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Contact fournisseur';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.contact_fournisseur',compact('fournisseurs','contacts','classe_referentiel','classe_consommation','classe_fournisseurs'));
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
        $contacts= new Contact;

        //Validation
        $this->validate($request,[
            
            'nom'   => 'required',
            'poste'   => 'required',
            'telephone'   => 'required',
            'email'   => 'required|email',
            'commentaire'   => 'required'
        ]);

        
        $contacts->fournisseur= Input::get('fournisseur_id');
        $contacts->client= null;
        $contacts->nom= Input::get('nom');
        $contacts->poste= Input::get('poste');
        $contacts->telephone= Input::get('telephone');
        $contacts->email= Input::get('email');
        $contacts->commentaire= Input::get('commentaire');
        
        $contacts->save();

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
        $contacts=Contact::findOrFail($request->id);      
        
        //Validation
        $this->validate($request,[
            
            'nom'   => 'required',
            'poste'   => 'required',
            'telephone'   => 'required',
            'email'   => 'required|email',
            'commentaire'   => 'required'
        ]);

        
        $contacts->fournisseur= Input::get('fournisseur_id');
        $contacts->client= null;        
        $contacts->nom= Input::get('nom');
        $contacts->poste= Input::get('poste');
        $contacts->telephone= Input::get('telephone');
        $contacts->email= Input::get('email');
        $contacts->commentaire= Input::get('commentaire');

        $contacts->save();

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
        $contacts=Contact::findOrFail($request->id);        
        $contacts->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
