<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Banque;
use App\Acce;
use Auth;

class BanquesController extends Controller
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
        $classe_banques=1;
        $classe_utilisation=1;
        $classe_caisse=1;
        $classe_tresorerie=1;
        $banque= Banque::with('ville')->get();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Banques';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return view('backoffice.banques',compact('banque','classe_referentiel','classe_banques','classe_caisse','classe_tresorerie','classe_utilisation'));
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
        $banques =  new Banque;
           //Validation
           $this->validate($request,[
            'code'              => 'required|unique:banques,code',
            'nom'               => 'required|unique:banques,nom',
            'nom_responsable'   => 'required',
            'adresse'           => 'required',
            'ville'          => 'required',
            'site_web'          => 'required',
            'description'       => 'required',
            'compte_general'    => 'required',
            'telephone'         => 'required',
            'gsm'               => 'required',
            'fax'               => 'required',
            'rc'                => 'required',
            'patente'           => 'required',
            'if'                => 'required'
            ]);

        $logo = $request->file('logoInput');
        if ($logo){
        $logo_name ='logo_Bank_'.rand(). '.' .$logo->getClientOriginalExtension();
        $logo->move(public_path('logo_banque'),$logo_name);
        $banques->logo = $logo_name;   
        }
        
        $banques->code = Input::get('code');
        $banques->nom = Input::get('nom');
        $banques->nom_responsable = Input::get('nom_responsable');
        $banques->adresse = Input::get('adresse');
        $banques->ville_id= $request->get('ville');
        $banques->site_web = Input::get('site_web');
        $banques->description = Input::get('description');
        $banques->compte_general = Input::get('compte_general');
        $banques->telephone = Input::get('telephone');
        $banques->gsm = Input::get('gsm');
        $banques->fax = Input::get('fax');
        $banques->rc = Input::get('rc');
        $banques->patente = Input::get('patente');
        $banques->if = Input::get('if');     
    
       $banques->save();
        
        
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
        $banques = Banque::findOrFail($request->id);
        //Validation
        $this->validate($request,[
            'code'              => 'required|unique:banques,code,'.$banques->id,
            'nom'               => 'required|unique:banques,nom,'.$banques->id,
            'nom_responsable'   => 'required',
            'adresse'           => 'required',
            'ville'             => 'required',
            'site_web'          => 'required',
            'description'       => 'required',
            'compte_general'    => 'required',
            'telephone'         => 'required',
            'gsm'               => 'required',
            'fax'               => 'required',
            'rc'                => 'required',
            'patente'           => 'required',
            'if'                => 'required'

        ]);


            $logo = $request->file('logoInput');

            if ($logo){
                $logo_name ='logo_Bank_'.rand().'.'.$logo->getClientOriginalExtension();
                $logo->move(public_path('logo_banque'),$logo_name);
                $banques->logo = $logo_name;   
            }

        $banques->code = Input::get('code');
        $banques->nom = Input::get('nom');
        $banques->nom_responsable = Input::get('nom_responsable');
        $banques->adresse = Input::get('adresse');
        $banques->ville_id= $request->get('ville');
        $banques->site_web = Input::get('site_web');
        $banques->description = Input::get('description');
        $banques->compte_general = Input::get('compte_general');
        $banques->telephone = Input::get('telephone');
        $banques->gsm = Input::get('gsm');
        $banques->fax = Input::get('fax');
        $banques->rc = Input::get('rc');
        $banques->patente = Input::get('patente');
        $banques->if = Input::get('if');
        
       //dd($request);
        
        $banques->save();

        return back()->with('success', 'Modification réussie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $banques = Banque::findOrFail($request->banque_id);
        $banques->delete($request->all());

        return back()->with('success', 'Suppression réussie');
    }
}
