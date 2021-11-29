<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Typescontrat;
use Auth;
use App\User;
use App\Acce;

class TypesContratsController extends Controller
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
        $classe_rh=1;
        $classe_contrat=1;

        $contrats= Typescontrat::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Types des contrats';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return view('backoffice.types_contrats',compact('contrats','classe_referentiel','classe_contrat','classe_rh'));
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
        $contrats = new Typescontrat;
        //Validation
        $this->validate($request,[
            'code'          => 'required',
            'libelle'       => 'required',
            'description'   => 'required'
        ]);

        $contrats->code= Input::get('code');
        $contrats->libelle= Input::get('libelle');
        $contrats->description= Input::get('description');
        $contrats->ajoute_par= Auth::user()->name;
        $contrats->modifie_par=' ';

        $contrats->save();

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
        
        $contrats = Typescontrat::findOrFail($request->id);
          //Validation
          $this->validate($request,[
            'code'          => 'required',
            'libelle'       => 'required',
            'description'   => 'required'
        ]);

        $contrats->code= Input::get('code');
        $contrats->libelle= Input::get('libelle');
        $contrats->description= Input::get('description');
        $contrats->modifie_par=Auth::user()->name;
       
        $contrats->save();
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
        $contrats = Typescontrat::findOrFail($request->contrat_id);

        $contrats->delete($request->all());
        return back()->with('success', 'Suppression réussie');
        
    }
}
