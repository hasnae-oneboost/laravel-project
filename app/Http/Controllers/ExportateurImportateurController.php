<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Exportateurimportateur;
use Auth;
use App\Acce;
use Session;
use Redirect;

class ExportateurImportateurController extends Controller
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
        $classe_exportateurs_importateurs=1;
            
        $exportateurs_importateurs = Exportateurimportateur::all();
       
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Exportateurs & importateurs';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.exportateurs_importateurs',compact('exportateurs_importateurs','classe_exportateurs_importateurs','classe_referentiel','classe_transprt'));
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
        $exportateurs_importateurs= new Exportateurimportateur;

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

        $exportateurs_importateurs->raison_sociale = Input::get('raison_sociale');
        $exportateurs_importateurs->adresse = Input::get('adresse');
        $exportateurs_importateurs->pay_id = $request->get('pays');
        $exportateurs_importateurs->ville_id = $request->get('ville');
        $exportateurs_importateurs->rc = Input::get('rc');
        $exportateurs_importateurs->patente = Input::get('patente');
        $exportateurs_importateurs->if = Input::get('if');
        $exportateurs_importateurs->capital = Input::get('capital');
        $exportateurs_importateurs->fixe1 = Input::get('fixe1');
        $exportateurs_importateurs->fixe2 = Input::get('fixe2');
        $exportateurs_importateurs->gsm = Input::get('gsm');
        $exportateurs_importateurs->fax = Input::get('fax');
        $exportateurs_importateurs->email = Input::get('email');
        $exportateurs_importateurs->site_web = Input::get('site_web');
        $exportateurs_importateurs->ajoute_par = Auth::user()->name;
        $exportateurs_importateurs->modifie_par = ' ';
        
     
        $exportateurs_importateurs->save();      
         
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
        $exportateurs_importateurs = Exportateurimportateur::findOrFail($request->id);
        

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

        $exportateurs_importateurs->raison_sociale = Input::get('raison_sociale');
        $exportateurs_importateurs->adresse = Input::get('adresse');
        $exportateurs_importateurs->pay_id = $request->get('pays');
        $exportateurs_importateurs->ville_id = $request->get('ville');
        $exportateurs_importateurs->rc = Input::get('rc');
        $exportateurs_importateurs->patente = Input::get('patente');
        $exportateurs_importateurs->if = Input::get('if');
        $exportateurs_importateurs->capital = Input::get('capital');
        $exportateurs_importateurs->fixe1 = Input::get('fixe1');
        $exportateurs_importateurs->fixe2 = Input::get('fixe2');
        $exportateurs_importateurs->gsm = Input::get('gsm');
        $exportateurs_importateurs->fax = Input::get('fax');
        $exportateurs_importateurs->email = Input::get('email');
        $exportateurs_importateurs->site_web = Input::get('site_web');
        $exportateurs_importateurs->modifie_par = Auth::user()->name;

        

        $exportateurs_importateurs->save();
        
        
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
        $exportateurs_importateurs= Exportateurimportateur::findOrFail($request->id);
        $exportateurs_importateurs->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
