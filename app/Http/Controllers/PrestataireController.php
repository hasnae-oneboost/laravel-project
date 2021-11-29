<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Prestataire;
use Auth;
use App\Acce;
use Session;
use Redirect;

class PrestataireController extends Controller
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
        $classe_transprt=1;
        $classe_prestataire=1;
            
        $prestataires = Prestataire::all();
       
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Prestataire';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.prestataires',compact('prestataires','classe_prestataire','classe_referentiel','classe_transprt'));
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
        $prestataires= new Prestataire;

        //Validation
         $this->validate($request,[
            'raison_sociale'       => 'required',
            'pays'   => 'required',
            'ville' => 'required',
            'adresse' => 'required',
            'fixe1'   => 'required',
            'fixe2'   => 'required',
            'gsm'   => 'required',
            'fax'   => 'required',
            'patente'   => 'required',
            'site_web'   => 'required',
            'email'   => 'required|email',            
            'rc'   => 'required',
            'if'   => 'required',
            'capital'   => 'required',        
        ]);

        $prestataires->raison_sociale = Input::get('raison_sociale');
        $prestataires->adresse = Input::get('adresse');
        $prestataires->pay_id = $request->get('pays');
        $prestataires->ville_id = $request->get('ville');
        $prestataires->rc = Input::get('rc');
        $prestataires->patente = Input::get('patente');
        $prestataires->if = Input::get('if');
        $prestataires->capital = Input::get('capital');
        $prestataires->fixe1 = Input::get('fixe1');
        $prestataires->fixe2 = Input::get('fixe2');
        $prestataires->gsm = Input::get('gsm');
        $prestataires->fax = Input::get('fax');
        $prestataires->email = Input::get('email');
        $prestataires->site_web = Input::get('site_web');
        $prestataires->ajoute_par = Auth::user()->name;
        $prestataires->modifie_par = ' ';
        
     
        $prestataires->save();      
         
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
        $prestataires = Prestataire::findOrFail($request->id);
        

        //Validation
         $this->validate($request,[
            'raison_sociale'       => 'required',
            'pays'   => 'required',
            'ville' => 'required',
            'adresse' => 'required',
            'fixe1'   => 'required',
            'fixe2'   => 'required',
            'gsm'   => 'required',
            'fax'   => 'required',
            'patente'   => 'required',
            'site_web'   => 'required',
            'email'   => 'required|email',            
            'rc'   => 'required',
            'if'   => 'required',
            'capital'   => 'required',        
        ]);

        $prestataires->raison_sociale = Input::get('raison_sociale');
        $prestataires->adresse = Input::get('adresse');
        $prestataires->pay_id = $request->get('pays');
        $prestataires->ville_id = $request->get('ville');
        $prestataires->rc = Input::get('rc');
        $prestataires->patente = Input::get('patente');
        $prestataires->if = Input::get('if');
        $prestataires->capital = Input::get('capital');
        $prestataires->fixe1 = Input::get('fixe1');
        $prestataires->fixe2 = Input::get('fixe2');
        $prestataires->gsm = Input::get('gsm');
        $prestataires->fax = Input::get('fax');
        $prestataires->email = Input::get('email');
        $prestataires->site_web = Input::get('site_web');
        $prestataires->modifie_par = Auth::user()->name;

        

        $prestataires->save();
        
        
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
        $prestataires= Prestataire::findOrFail($request->id);
        $prestataires->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
