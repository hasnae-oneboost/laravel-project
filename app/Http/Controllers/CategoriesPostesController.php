<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Categoriesposte;
use Auth;
use App\User;
use App\Acce;

class CategoriesPostesController extends Controller
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
        $classe_cat_postes=1;

        $categories= Categoriesposte::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Categories des postes';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        return view('backoffice.categories_postes',compact('categories','classe_referentiel','classe_cat_postes','classe_rh'));
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
        $categories = new Categoriesposte;
        //Validation
        $this->validate($request,[
            'code'          => 'required|unique:categories_postes,code',
            'libelle'       => 'required',
            'description'   => 'required'
        ]);

        $categories->code= Input::get('code');
        $categories->libelle= Input::get('libelle');
        $categories->description= Input::get('description');
        $categories->ajoute_par= Auth::user()->name;
        $categories->modifie_par= ' ';

        $categories->save();

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

        $categories = Categoriesposte::findOrFail($request->id);
          //Validation
          $this->validate($request,[
            'code'          => 'required|unique:categories_postes,code,'.$categories->id,
            'libelle'       => 'required',
            'description'   => 'required'
        ]);

        $categories->code= Input::get('code');
        $categories->libelle= Input::get('libelle');
        $categories->description= Input::get('description');
        $categories->modifie_par= Auth::user()->name;
    

        $categories->save();

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
        
        $categories = Categoriesposte::findOrFail($request->cat_id);
        $categories->delete($request->all());

        return back()->with('success', 'Suppression réussie');

    }
}
