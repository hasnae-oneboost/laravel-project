<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marchandise;
use App\{Typesmarchandise,Tva,Unite};
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
class MarchandisesController extends Controller
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
        $classe_utilisation=1;
        $classe_marchandises=1;

        $marchandises= Marchandise::all();
        $types = Typesmarchandise::all();
        $unites= Unite::all();
        $tva= Tva::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Marchandises';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return View('backoffice.marchandises',compact('marchandises','types','unites','tva','classe_referentiel','classe_utilisation','classe_marchandises'));

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
        $marchandises = new Marchandise;

        //Validation
        $this->validate($request,[
            
            'libelle'       => 'required',
            'type_marchandise' => 'required',
            'tva'   =>  'required',
            'unite' =>  'required',
            'description'   => 'required',
            
        ]);

        $marchandises->libelle= Input::get('libelle');
        $marchandises->type_id= Input::get('type_marchandise');
        $marchandises->tva_id = Input::get('tva');
        $marchandises->unite_id = Input::get('unite');
        $marchandises->description= Input::get('description');
        $marchandises->ajoute_par= Auth::user()->name;
        $marchandises->modifie_par= ' ';

        $marchandises->save();

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
        $marchandises = Marchandise::findOrFail($request->id);

        //Validation
        $this->validate($request,[
            
            'libelle'       => 'required',
            'type_marchandise' => 'required',
            'tva'   =>  'required',
            'unite' =>  'required',
            'description'   => 'required',
            
        ]);

        $marchandises->libelle= Input::get('libelle');
        $marchandises->type_id= Input::get('type_marchandise');
        $marchandises->tva_id = Input::get('tva');
        $marchandises->unite_id = Input::get('unite');
        $marchandises->description= Input::get('description');
        $marchandises->modifie_par= Auth::user()->name;

        $marchandises->save();

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
        $marchandises = Marchandise::findOrFail($request->id);
        $marchandises->delete($request->all());
        
        return back()->with('success', 'Suppression réussie');
        
    }
}
