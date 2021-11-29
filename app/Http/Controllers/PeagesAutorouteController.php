<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peagesautoroute;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class PeagesAutorouteController extends Controller
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
        $classe_consommation=1;
        $classe_peage_auto=1;
        $classe_peage=1;
        
        $categories = Peagesautoroute::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Péages autoroute';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.peages_autoroute',compact('categories','classe_peage','classe_peage_auto','classe_referentiel','classe_consommation'));
   
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
        $categories= new Peagesautoroute;
        $this->validate($request,[
            'peage' => 'required'
        ]);

        $categories->peage=Input::get('peage');
        $categories->ajoute_par=Auth::user()->name;
        $categories->modifie_par=' ';

        $categories->save();
        return back()->with('success','Ajout réussi');
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
        $categories= Peagesautoroute::findOrFail($request->id);
        $this->validate($request,[
            'peage' => 'required'
        ]);

        $categories->peage=Input::get('peage');
        $categories->modifie_par=Auth::user()->name;

        $categories->save();
        return back()->with('success','Modification réussie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $categories= Peagesautoroute::findOrFail($request->id);
        $categories->delete($request->all());
        return back()->with('success','Suppression réussie');
        
    } 
}
