<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marque;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;

class MarqueController extends Controller
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
        $classe_marque=1;
        
        $marques = Marque::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Marques';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.marques',compact('marques','classe_classement','classe_class','classe_referentiel','classe_marque'));
   
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
        $marques= new Marque;
        $this->validate($request,[
            'marque' => 'required',
            'logoInput' => 'required'
        ]);

        $logo = $request->file('logoInput');
        if($logo){
            $logo_name ='logo_Marque_'.rand().'.'.$logo->getClientOriginalExtension();
            $logo->move(public_path('logo_marque'),$logo_name);
            $marques->logo = $logo_name;   
        }
                    
        $marques->marque=Input::get('marque');
        $marques->ajoute_par=Auth::user()->name;
        $marques->modifie_par=' ';


        $marques->save();
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
        $marques= Marque::findOrFail($request->id);
        $this->validate($request,[
            'marque' => 'required'
        ]);

        $logo = $request->file('logoInput');

        if ($logo){
            $logo_name ='logo_Marque_'.rand().'.'.$logo->getClientOriginalExtension();
            $logo->move(public_path('logo_marque'),$logo_name);
            $marques->logo = $logo_name;   
        }

        $marques->marque=Input::get('marque');
        $marques->modifie_par=Auth::user()->name;

        $marques->save();
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
        $marques= Marque::findOrFail($request->id);
        $marques->delete($request->all());
        return back()->with('success','Suppression réussie'); 
    } 
}
