<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Typesabsence;
use Auth;
use App\User;
use App\Acce;

class TypesAbsencesController extends Controller
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
        $classe_abs=1;

        $absences= Typesabsence::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Types des absences';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return view('backoffice.types_absences',compact('absences','classe_referentiel','classe_abs','classe_rh'));
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
        $absences= new Typesabsence;

        //Validation
        $this->validate($request,[
            'code'          => 'required',
            'libelle'       => 'required',
            'description'   => 'required'
        ]);

        $absences->code= Input::get('code');
        $absences->libelle= Input::get('libelle');
        $absences->description= Input::get('description');
        $absences->ajoute_par= Auth::user()->name;

        $absences->modifie_par= ' ';

        $absences->save();

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
        $absences= Typesabsence::findOrFail($request->id);

        //Validation
        $this->validate($request,[
            'code'          => 'required',
            'libelle'       => 'required',
            'description'   => 'required'
        ]);

        $absences->code= Input::get('code');
        $absences->libelle= Input::get('libelle');
        $absences->description= Input::get('description');
        $absences->modifie_par= Auth::user()->name;

        $absences->save();

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
        $absences= Typesabsence::findOrFail($request->abs_id);
        $absences->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    
    }
}
