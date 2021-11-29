<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Typessemiremorque;

class TypesSemiRemorqueController extends Controller
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
        $classe_types_semi_remorque=1;
        
        $types = Typessemiremorque::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Types des semi_remorques';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.types_semi_remorques',compact('types','classe_types_semi_remorque','classe_class','classe_referentiel','classe_classement'));
   
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
        $types= new Typessemiremorque;
        $this->validate($request,[
            'libelle' => 'required'
        ]);

       /* $icone = $request->file('iconeInput');
        if($icone){
            $icone_name ='icone_vehicule_'.rand().'.'.$icone->getClientOriginalExtension();
            $icone->move(public_path('icone_vehicule'),$icone_name);
            $types->icone = $icone_name;   
        }*/
        $types->libelle=Input::get('libelle');
        $types->ajoute_par=Auth::user()->name;
        $types->modifie_par=' ';

        $types->save();
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
        $types= Typessemiremorque::findOrFail($request->id);
        $this->validate($request,[
            'libelle' => 'required'
        ]);
        $icone = $request->file('iconeInput');
        /*if($icone){
            $icone_name ='icone_vehicule_'.rand().'.'.$icone->getClientOriginalExtension();
            $icone->move(public_path('icone_vehicule'),$icone_name);
            $types->icone = $icone_name;   
        }*/

        $types->libelle=Input::get('libelle');
        $types->modifie_par=Auth::user()->name;

        $types->save();
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
        $types= Typessemiremorque::findOrFail($request->id);
        $types->delete($request->all());
        return back()->with('success','Suppression réussie');
        
    } 
}
